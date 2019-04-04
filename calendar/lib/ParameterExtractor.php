<?php

namespace TCMaker\Calendar;

class ParameterExtractor
{
  public $year = null;
  public $month = null;
  public $day = 1;
  public function __construct($params)
  {
    if (array_key_exists('cal-year', $params)) {
      $this->year = $params['cal-year'];
    }
    
    if (array_key_exists('cal-month', $params)) {
      $this->month = $params['cal-month'];
    }

    if (array_key_exists('cal-day', $params)) {
      $this->year = $params['d'];
    }

    if (array_key_exists('cal-date', $params)) {
      $parts = explode('-', $params['date']);

      if (count($parts) == 3) {
        $this->year = $parts[0];
        $this->month = $parts[1];
        $this->day = $parts[2];
      }
    }

    $date = getdate(time());

    if (! is_numeric($this->year)) {
      $this->year = $date['year'];
    }

    if (! is_numeric($this->month)) {
      $this->month = $date['mon'];
    }

    if (! is_numeric($this->day)) {
      $this->day = $date['mday'];
    }

  }
}
