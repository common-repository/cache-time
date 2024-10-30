<?php
/*
Plugin Name: Cache time
Plugin URI: http://www.wesg.ca/2008/05/wordpress-plugin-cache-time/
Description: Display the time that the page was cached.
Version: 1.02
Author: Wes Goodhoofd
Author URI: http://www.wesg.ca/

This program is free software; you can redistribute it and/or
modify it under the terms of version 2 of the GNU General Public
License as published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details, available at
http://www.gnu.org/copyleft/gpl.html
or by writing to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

//plugin function
function cache_time() {
global $wpdb;

//text if the page is cached
$cached = 'Page cached on: ';
//text if page is dynamic
$not_cached = 'Time is now: ';

	//get time zone calculation from database
	$result = $wpdb->get_var("SELECT option_value FROM $wpdb->options WHERE option_name = 'gmt_offset'");

	//find the timestamp of the current time, with time zone calculation
	//change "M d, Y g:i A" to show other information according to
	//http://www.w3schools.com/php/func_date_gmdate.asp
	$time = gmdate("M d, Y g:i A", mktime(date("H") + $result, date('i'), date('s'), date('m'), date('d'), date('Y')));

	//change everything between ' ' to change the output
	$result = check_cache();
	
	//print corresponding text
	if ($result == false)
		echo $cached.$time;
	else if ($result == true)
		echo $not_cached.$time;
}

function check_cache() {
	global $cache_rejected_uri;

//check if WP-Cache is enabled and if the page is rejected
if (isset($cache_rejected_uri)) {
	$uri = $_SERVER['REQUEST_URI'];
	$count = 1;
	$elements = count($cache_rejected_uri);
	foreach ($cache_rejected_uri as &$array) {
		if ($uri == $array)	{
			$result = true;
			$found = true;
		}
	}
	if ($found != true)
		$result = false;
	if (substr_count($uri, '?p') == 1)
			$result = true;
}
else
	$result = false;
//return the final text
return $result;
}
?>