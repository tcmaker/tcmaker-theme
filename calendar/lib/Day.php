<?php
namespace TCMaker\Calendar;

class Day
{
  protected $year;
  protected $month;
  protected $day;
  protected $isFiller = false;
  protected $events = array();

  public static function fromDateTime($dt, $calendarMonth)
  {
    $year = $dt->format('Y');
    $month = $dt->format('m');
    $day = $dt->format('d');

    $instance = new Day($year, $month, $day);
    if ($month != $calendarMonth) {
      $instance->setIsFiller(true);
    }

    return $instance;
  }

  public function __construct($year, $month, $day)
  {
    $this->year = $year;
    $this->month = $month;
    $this->day = $day;
  }

  public function setIsFiller($val)
  {
    $this->isFiller = $val;
  }

  public function isFiller()
  {
    return $this->isFiller;
  }

  public function getYear()
  {
    return $this->year;
  }

  public function getMonth()
  {
    return $this->month;
  }

  public function getDay()
  {
    return $this->day;
  }

  public function getDayOfWeek()
  {
    return date('l', mktime(0, 0, 0, $this->day, $this->month, $this->year));
  }

  public function getEvents()
  {
    return $this->events;
  }

  public function addEvent($event)
  {
    $this->events[] = $event;
  }
}
