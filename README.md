GogleCalendar
====================

This is a more flexible Google Calendar embedding Extension for Meadiawiki.

It currently allows the following arguments in **gcal** or **googlecalendar** tags:

* width - the width of the google calendar, specify an integer.
* height - the height of the google calendar, again an integer.
* view - the default view; "WEEK", "MONTH", or "AGENDA".
* tabs - allow the user to change view or not, 1 or 0.

eg:

     <gcal width=300 height=600 view="AGENDA" tabs=1>mygooglecalendar%40groups.google.com</gcal>

It's also pretty tolerant of syntax so just pasting the whole block from google right between the tags will work, I'll even parse out the options from that.


Installation
============
Clone this repo into /var/www/extensions/BetterGoogleCalendar/ or wherever yours is.

Add this to your LocalSettings.php:

    require_once( "$IP/extensions/BetterGoogleCalendar/BetterGoogleCalendar.php" );
