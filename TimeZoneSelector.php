<?php
// get a list of available timezones
$timezones = DateTimeZone::listIdentifiers();

// create a select element to display the timezones
echo '<select name="timezone">';

// loop through the available timezones and add them to the select element
foreach($timezones as $timezone) {
  // create a DateTimeZone object for the current timezone
  $tz = new DateTimeZone($timezone);

  // get the timezone offset from UTC for the current timezone
  $offset = $tz->getOffset(new DateTime());

  // format the timezone offset as +/-HH:MM
  $offset_formatted = sprintf('%+03d:%02d', $offset / 3600, abs($offset) % 3600 / 60);

  // create an option element for the current timezone
  echo '<option value="' . $timezone . '">' . $timezone . ' (' . $offset_formatted . ')</option>';
}

echo '</select>';
?>
