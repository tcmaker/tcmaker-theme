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
require_once __DIR__ . '/lib/UpcomingEvents.php';
require_once __DIR__ . '/lib/Eventbrite.php';

// Define Admin Screens
add_action('admin_menu', function() {
  add_options_page('Calendar API Keys', 'Calendar Services', 'manage_options', 'my-unique-identifier', function() {
    if (!current_user_can('manage_options'))  {
      wp_die('You do not have sufficient permissions to access this page.');
    }
    echo '<div class="wrap">';
    echo '<h1>Calendar Services</h1>';
    echo '<form method="post" action="options.php">';
    settings_fields('calendar-api-keys');
    do_settings_sections('calendar-api-keys');
    echo '<table class="form-table">';
    echo '<tr valign="top">';
    echo '<th scope="row">Eventbrite Personal Oauth Token</th>';
    echo '<td><input type="text" name="eventbrite_token" value="' . esc_attr(get_option('eventbrite_token')) . '" /></td>';
    echo '</tr>';

    echo '<tr valign="top">';
    echo '<th scope="row">Google Calendar Application Key</th>';
    echo '<td><input type="text" name="google_calendar_key" value="' . esc_attr(get_option('google_calendar_key')) . '" /></td>';
    echo '</tr>';

    echo '<tr valign="top">';
    echo '<th scope="row">Main Google Calendar ID</th>';
    echo '<td><input type="text" name="main_google_calendar_id" value="' . esc_attr(get_option('main_google_calendar_id')) . '" /></td>';
    echo '</tr>';

    echo '</table>';

    submit_button();
    echo '</form>';
    echo '</div>';
  });
});

add_action('admin_init', function() {
  register_setting('calendar-api-keys', 'eventbrite_token');
  register_setting('calendar-api-keys', 'google_calendar_key');
  register_setting('calendar-api-keys', 'main_google_calendar_id');
});

// Register stuff, I guess.
// add_action('init', function() {
//   add_rewrite_tag('%event_id%', '([0-9]+)');
//   add_rewrite_tag('%cal-year%', '([0-9]+)');
//   add_rewrite_tag('%cal-month%', '([0-9]+)');
//   add_rewrite_tag('%cal-day%', '([0-9]+)');
//
//   // add_rewrite_rule('classes\/([0-9]+)', '/classes/class?event_id=$matches[0]', 'top');
// });
