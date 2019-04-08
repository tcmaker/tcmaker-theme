<?php
/*
Plugin Name: TC Maker Calendar Services
Plugin URI: https://github.com/tcmaker
Description: Dude, it's a calendar.
Version: 1.0.0
Author: Stephen Van Dahm
Author URI: http://vandahm.com/

    Copyright (c) 2019 Twin Cities Maker, Inc. We'll figure out the licensing
    shit later.
*/

// 3rd-party SDKs.
require_once __DIR__ . '/google-api-php-client-2.2.2/vendor/autoload.php';
// require_once __DIR__ . '/eventbrite_sdk/HttpClient.php';

require_once __DIR__ . '/lib/ParameterExtractor.php';
require_once __DIR__ . '/lib/MonthCalendar.php';
require_once __DIR__ . '/lib/Day.php';
require_once __DIR__ . '/lib/Eventbrite.php';

// Register stuff, I guess.
// add_action('init', function() {
//   add_rewrite_tag('%event_id%', '([0-9]+)');
//   add_rewrite_tag('%cal-year%', '([0-9]+)');
//   add_rewrite_tag('%cal-month%', '([0-9]+)');
//   add_rewrite_tag('%cal-day%', '([0-9]+)');
//
//   // add_rewrite_rule('classes\/([0-9]+)', '/classes/class?event_id=$matches[0]', 'top');
// });
