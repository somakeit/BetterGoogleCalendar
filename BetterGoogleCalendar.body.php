<?php

class BetterGoogleCalendar {

  /* This function is called each time one of our tags is hit. */
  public static function embed( $input, $args, $parser, $frame ) {
    /* attempt to parse the calendar we're supposed to be displaying
     regardless of what the luser pasted in the box. 
     I'm trying to match something like this (but without the eq and
     the amp) regardless of how much more of the iframe source we
     were given:
       =c3at705hnnkj664j2gesvsnvh8%40group.calendar.google.com&
    */
    if ( preg_match( '/[0-9a-z]+(?:\%40|@)[.0-9a-z]+/', $input, $matches ) ) {
      $calendar = str_replace("@", "%40", $matches[0]);
    } else {
      return "<p>Sorry, that doesnt look like a calendar to me.</p>";
    }

    /* set defaults. */
    $tabs = true;
    $view = 'MONTH';
    $width = 800;
    $height = 600;
    
    /* attempt to parse out supported options if the user set them in
     google then pasted them between out tags. */
    if ( preg_match( '/showTabs=([01])/', $input, $matches ) ) {
      $tabs = $matches[1];
    }
    if ( preg_match( '/mode=([A-Z]+)/', $input, $matches ) ) {
      $view = $matches[1];
    }
    if ( preg_match( '/width=\"([0-9]+)\"/', $input, $matches ) ) {
      $width = intval( $matches[1] );
    }
    if ( preg_match( '/height=\"([0-9]+)\"/', $input, $matches ) ) {
      $height = intval( $matches[1] );
    }

    /* grab the arguments specified in our tag and overwrite whatever
     else might have been set. */
    if ( isset( $args['tabs'] ) ) {
      $tabs = $args['tabs'];
    }
    if ( isset( $args['view'] ) ) {
      $view = $args['view'];
    }
    if ( isset( $args['width'] ) ) {
      $width = intval( $args['width'] );
    }
    if ( isset( $args['height'] ) ) {
      $height = intval( $args['height'] );
    }

    /* Our variables come form all sorts of places, make them safe. */
    if ( $tabs ) {
      $tabs = '1';
    } else {
      $tabs = '0';
    }
    $view = htmlspecialchars( $view );

    /* finally embed a calendar. */
    return "<iframe src=\"https://www.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=$tabs&amp;showCalendars=0&amp;mode=$view&amp;height=$height&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=$calendar&amp;color=%232952A3&amp;ctz=Europe%2FLondon\" style=\" border-width:0 \" width=\"$width\" height=\"$height\" frameborder=\"0\" scrolling=\"no\"></iframe>";

  }

}
