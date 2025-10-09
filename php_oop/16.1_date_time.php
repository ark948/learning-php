<?php

// php allows for working with date and time in an object-oriented way

// to create a new date and time object
$datetime = new DateTime();
var_dump($datetime);
/*
object(DateTime)#1 (3) {
    ["date"]=> string(26) "2021-07-15 06:30:40.294788"
    ["timezone_type"]=>  int(3)
    ["timezone"]=>  string(13) "Europe/Berlin"
}
*/

// this will return the  current date and time in timezone specified in php.ini

// to set a new timezone, you create a new DateTimeZone obj and pass it to setTimezone() of DateTime object

$datetime = new DateTime();
$timezone = new DateTimeZone('America/Los_Angeles');
$datetime->setTimezone($timezone);
var_dump($datetime);
/*
object(DateTime)#1 (3) {
    ["date"]=> string(26) "2021-07-14 21:33:27.986925"
    ["timezone_type"]=> int(3)
    ["timezone"]=> string(19) "America/Los_Angeles"
}
*/

// IMPORTANT
// valid timezones are in php official website (timezone list)

// to format a DateTime object, use the format() method
// The format string parameters are the same as those you use for the date() function.
$datetime = new DateTime();
echo $datetime->format('m/d/Y g:i A'); // 07/15/2021 6:38 AM

// To set a specific date and time, you can pass a date & time string to the DateTime() constructor like this:
$datetime = new DateTime('12/31/2019 12:00 PM');
echo $datetime->format('m/d/Y g:i A');

// Or you can use the setDate() function to set a date
$datetime = new DateTime();
$datetime->setDate(2020, 5, 1);
echo $datetime->format('m/d/Y g:i A'); // 05/01/2020 6:42 AM

// The time is derived from the current time. To set the time, you use the setTime() function
$datetime = new DateTime();
$datetime->setDate(2020, 5, 1);
$datetime->setTime(5, 30, 0);
echo $datetime->format('m/d/Y g:i A'); // 05/01/2020 5:30 AM

// Since the setDate(), setTime(), and setTimeZone() method returns the DateTime object, you can chain them like this which is quite convenient
$datetime = new DateTime();
echo $datetime->setDate(2020, 5, 1)
    ->setTime(5, 30)
    ->setTimezone(new DateTimeZone('America/New_York'))
    ->format('m/d/Y g:i A');
// 04/30/2020 11:30 PM

// DateTime object can also accept strings
$datetime = new DateTime('06/08/2021');
echo $datetime->format('F jS, Y'); // June 8th, 2021
// IMPORTANT
// If you want to pass it as August 6th, 2021, you need to use the – or . instead of /. For example:
$datetime = new DateTime('06-08-2021');
echo $datetime->format('F jS, Y'); // August 6th, 2021

// However, if you want to parse the date string ’06/08/2021′ as d/m/Y, you need to replace the / with – or . manually
$ds = '06/08/2021';
$datetime = new DateTime(str_replace('/', '-', $ds));
echo $datetime->format('F jS, Y'); // August 6th, 2021

// A better way to do it is to use the createFromFormat() static method of the DateTime object
$ds = '06/08/2021';
$datetime = DateTime::createFromFormat('d/m/Y', $ds);
echo $datetime->format('F jS, Y');

// Note that when you pass a date string without the time, 
// the DateTime() constructor uses midnight time. However, the createFromFormat() method uses the current time

// DateTime objects can be compared
$datetime1 = new DateTime('01/01/2021 10:00 AM');
$datetime2 = new DateTime('01/01/2021 09:00 AM');
var_dump($datetime1 < $datetime2); // false
var_dump($datetime1 > $datetime2); // true
var_dump($datetime1 == $datetime2); // false
var_dump($datetime1 <=> $datetime2); // 1

// The diff() method of the DateTime() object returns the difference between two DateTime() objects as a DateInterval object. 
$dob = new DateTime('01/01/1990');
$to_date = new DateTime('07/15/2021');
$age = $to_date->diff($dob);
var_dump($age);

// the result can be formateed
$dob = new DateTime('01/01/1990');
$to_date = new DateTime('07/15/2021');
echo $to_date->diff($dob)->format('%Y years, %m months, %d days'); // 31 years, 6 months, 14 days


// To add an interval to date, you create a new DateInterval object and pass it to the add() method
// The following example adds 1 year 2 months to the date 01/01/2021
$datetime = new DateTime('01/01/2021');
$datetime->add(new DateInterval('P1Y2M'));
echo $datetime->format('m/d/Y'); // 03/01/2022

