<?php
/**********************************************************
* rutorrent Credentials: Basic security for rutorrent
* Author: Carlos Jimenez Delgado (mail@carlosjdelgado.com)
* License: GNU General Public License
**********************************************************/
	session_start();

	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_COOKIE['username']);
	unset($_COOKIE['password']);
	setcookie("username", "", time()-3600);
	setcookie("password", "", time()-3600);
	
	header('Location: ./login.php');
?>