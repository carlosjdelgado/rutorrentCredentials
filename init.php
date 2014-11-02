<?php
/**********************************************************
* rutorrent Credentials: Basic security for rutorrent
* Author: Carlos Jimenez Delgado (mail@carlosjdelgado.com)
* License: GNU General Public License
**********************************************************/
	session_start();
	include_once 'conf.php';
	
	// convert cookies to session vars
 	if (isset($_COOKIE['username'])) $_SESSION['username'] = $_COOKIE['username'];
 	if (isset($_COOKIE['password'])) $_SESSION['password'] = $_COOKIE['password'];
 	
	if ($_SESSION['username'] != $c_username || $_SESSION['password'] != $c_password) {
		$jResult .= 'window.location.href = "plugins/rutorrentCredentials/login.php";';
	}
	
	$theSettings->registerPlugin($plugin["name"],$pInfo["perms"]);
	
?>
