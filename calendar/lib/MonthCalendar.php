<?php

namespace TCMaker\Calendar;

class MonthCalendar
{
  protected $month;
  protected $year;
  protected $events;
  protected $beginningOfCalendar;
  protected $endOfCalendar;

  public function __construct($year, $month)
  {
    date_default_timezone_set('America/Chicago');
    $this->month = $month;
    $this->year = $year;

    $beginningOfMonth = getdate(strtotime("$year-$month-1 00:00:00"));;
    $endOfMonth = getdate(strtotime("last day of {$this->year}-{$this->month}"));

    // Since Sunday has a numerical code of 0 and our calendar begins on Sunday,
    // $dayOfMonth is also, conveniently, the number of extra days to add
    // to the beginning of the calendar.
    $dayOfMonth = $beginningOfMonth['wday'];
    $beginningOfCalendar = $beginningOfMonth[0] - (60 * 60 * 24 * $dayOfMonth);

    // The last day of the calendar is always Saturday, which has a numerical
    // code of 6. So, 6 minus the wday of $endOfMonth should be the number of
    // days to add to the end of the calendar.
    $dayOfMonth = $endOfMonth['wday'];
    $extraDays = 6 - $dayOfMonth;
    $endOfCalendar = $endOfMonth[0] + ($extraDays * 60 * 60 * 24);

    // These Unix timestamps aren't useful to us anymore. Convert to DateTime
    // objects.
    $this->beginningOfCalendar = getdate($beginningOfCalendar);
    $this->beginningOfCalendar = new \DateTime("{$this->beginningOfCalendar['year']}-{$this->beginningOfCalendar['mon']}-{$this->beginningOfCalendar['mday']} 00:00:00");

    $this->endOfCalendar = getdate($endOfCalendar);
    $this->endOfCalendar = new \DateTime("{$this->endOfCalendar['year']}-{$this->endOfCalendar['mon']}-{$this->endOfCalendar['mday']} 23:59:59");

    // Instantiate Calendar Client
    $client = new \Google_Client();
    $client->setApplicationName('Twin Cities Maker Calendar');
    $client->setScopes(\Google_Service_Calendar::CALENDAR_READONLY);

    $developerKey = get_option('google_calendar_key');
    $client->setDeveloperKey($developerKey);
    $service = new \Google_Service_Calendar($client);

    $calendarId = get_option('main_google_calendar_id');
    $optParams = array(
      'orderBy' => 'startTime',
      'singleEvents' => true,
      'timeMin' => $this->beginningOfCalendar->format(\DateTimeInterface::RFC3339),
      'timeMax' => $this->endOfCalendar->format(\DateTimeInterface::RFC3339),
    );
    $this->events = $service->events->listEvents($calendarId, $optParams);
  }

  public function getNextMonthCalendarUrl()
  {
    global $wp;

    $y = $this->year;
    $m = $this->month + 1;

    if ($m > 12) {
      $y++;
      $m = 1;
    }

    return $wp->request . "?cal-year={$y}&cal-month={$m}";
  }

  public function getPreviousMonthCalendarUrl()
  {
    global $wp;

    $y = $this->year;
    $m = $this->month - 1;

    if ($m < 1) {
      $y--;
      $m = 12;
    }
    return $wp->request . "?cal-year={$y}&cal-month={$m}";
  }

  public function getEventsByDay()
  {
    $days = array();
    $increment = \DateInterval::createFromDateString('1 day');
    $currentDay = clone $this->beginningOfCalendar;

    while ($currentDay <= $this->endOfCalendar)
    {

      $days[$currentDay->format('Y-m-d')] = Day::fromDateTime($currentDay, $this->month);
      $currentDay->add($increment);
    }

    foreach ($this->events as $event) {
      if ($event->getStart()->getDateTime()) {
        $key = new \DateTime($event->getStart()->getDateTime());
      } else {
        $key = new \DateTime($event->getStart()->getDate());
      }
      $key = $key->format('Y-m-d');

      // TODO: Fix this awful hack. We need a better way to hide events from the website calendar.
      if ($event->getSummary() != 'Trash Pickup' && $event->getSummary() != 'Recycle Pickup') {
        $days[$key]->addEvent($event);
      }
    }

    return $days;
  }

  public function getEvents()
  {
    return $this->events;
  }

  public function getEventsByWeek()
  {
    $days = $this->getEventsByDay();

    $weeks = array();
    $week = array();
    $i = 0;
    foreach ($days as $key => $day) {
      $week[$key] = $day;

      if ($i % 7 == 6) {
        $weeks[] = $week;
        $week = array();
      }
      $i++;
    }

    return $weeks;
  }

  public function getMonthAndYearInEnglish()
  {
    return date('F Y', mktime(0, 0, 0, $this->month, 1, $this->year));
  }
}
