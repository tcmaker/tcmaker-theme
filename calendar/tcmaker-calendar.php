<?php
/*
Plugin Name: TC Maker Google Calendars
Plugin URI: https://github.com/tcmaker
Description: Dude, it's a calendar.
Version: 1.0.0
Author: Stephen Van Dahm
Author URI: http://vandahm.com/

    Copyright (c) 2019 Twin Cities Maker, Inc. We'll figure out the licensing
    shit later.
*/


// $clientID = '99266252284-8go0fgrc55tcbi3suniu4o4de61iii3d.apps.googleusercontent.com';
// $clientSecret = 'ClxPWN3EAI791zLY69YyWwll';

require_once __DIR__ . '/google-api-php-client-2.2.2/vendor/autoload.php';
require_once __DIR__ . '/lib/ParameterExtractor.php';
require_once __DIR__ . '/lib/MonthCalendar.php';
require_once __DIR__ . '/lib/Day.php';
