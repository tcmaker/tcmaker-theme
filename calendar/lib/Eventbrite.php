<?php
namespace TCMaker\Calendar;

class Eventbrite
{
  protected $personalOauthToken = null;

  public function __construct()
  {
    $this->personalOauthToken = get_option('eventbrite_token');
  }

  public function getUpcomingClasses()
  {
    $events = array();
    $page = 1;
    do {
      $resp = $this->get("/users/me/events?status=live,started&page=$page");
      $json = json_decode($resp['body']);
      foreach ($json->events as $event) {
        // Strip out open houses.
        if ($event->is_series && $event->series_id == "46204294288") { continue; }

        // Otherwise, just add the event.
        $events[] = $event;
      }
      $page++;
    } while($json->pagination->has_more_items == true);

    return $events;
  }

  public function getEvent($eventId)
  {
    return $this->get("/events/$eventId?expand=organizer,ticket_availability");
  }

  protected function get($uri)
  {
    return wp_remote_get('https://www.eventbriteapi.com/v3' . $uri, array(
      'headers' => array('Authorization' => "Bearer {$this->personalOauthToken}")
    ));
  }
}
