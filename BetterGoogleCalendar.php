<?php

$wgAutoloadClasses['BetterGoogleCalendar'] = dirname(__FILE__) . '/BetterGoogleCalendar.body.php';
$wgHooks['ParserFirstCallInit'][] = 'efBetterGoogleCalendarSetup';

/* Take credit for almost no work. */
$wgExtensionCredits['validateextensionclass'][] = array(
  'path'        => __FILE__,
  'name'        => 'BetterGoogleCalendar',
  'author'      => 'Bracken Dawson',
  'url'         => 'http://github.com',
  'description' => 'Allows configurable embedding of Google calendars.',
  'version'     => '0.1.0');

function efBetterGoogleCalendarSetup( Parser &$parser ) {
  /* Register a couple of hooks pointing at our embed code. */
  $parser->setHook( 'googlecalendar', 'BetterGoogleCalendar::embed' );
  $parser->setHook( 'gcal', 'BetterGoogleCalendar::embed' );
  return true;
}
