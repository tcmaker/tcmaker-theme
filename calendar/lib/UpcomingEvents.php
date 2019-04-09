<?php

namespace TCMaker\Calendar;

class UpcomingEvents
{
  protected $service;

  public function __construct()
  {
    date_default_timezone_set('America/Chicago');
    $client = new \Google_Client();
    $client->setApplicationName('Twin Cities Maker Calendar');
    $client->setScopes(\Google_Service_Calendar::CALENDAR_READONLY);
    $client->setDeveloperKey(get_option('google_calendar_key'));
    $this->service = new \Google_Service_Calendar($client);
  }

  public function getEvents($num=4)
  {
    $calendarId = get_option('main_google_calendar_id');
    $optParams = array(
      'maxResults' => $num,
      'orderBy' => 'startTime',
      'singleEvents' => true,
      'timeMin' => date('c'),
    );

    return $this->service->events->listEvents($calendarId, $optParams);
  }
}
