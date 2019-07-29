<?php

/**
 * Logued page 
 *
 * Once the user session unlock, he will arrive here
 *
 * @file    connected.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	session_start();

	// get request data
	$address = $_REQUEST["address"];

	if (isset($_SESSION['user_session_padlock']) 
		&& !empty($_SESSION['user_session_padlock']) 
		&& $_SESSION['user_session_padlock'] == true
		&& $_SESSION['user'] == $address) {

		echo '<div id="connectedpage">';

		require('logo.php');

		echo '<br /><br />';
		echo '<div class="top">';
		echo 'You are logged now.';
		echo '</div>';
		echo '<br /><br />';
		echo '<div class="bottom">';
		echo '<a onclick="javascript:loadLoginPage()">» Disconnect and back to the login page «</a>';
		echo '</div>';
	} else {
		unset($address);
		header("Refresh:0; url=unauthorized.php");
	}
	echo '</div>';
?>
