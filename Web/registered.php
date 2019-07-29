<?php

/**
 * Save a new user account
 *
 * Add a new user account into the database
 *
 * @file    registred.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	require('./destroy_session.php');

	// get user registration data
	$nickname = $_REQUEST["nickname"];
	$password = md5($_REQUEST["password"]);
	$address = $_REQUEST["address"];

	// load database constants
	require('conf.php');

	// Create mysql connection
	$mysql = new mysqli($server, $user, $pwd, $db);
	// Check mysql connection
	if ($mysql->connect_error) {
		 die("Connection failed: " . $mysql->connect_error);
	}

	// prepare query
	$sql = "INSERT INTO `users` (`user_id`, `user_nickname`, `user_password`, `user_obyte_address`) VALUES (NULL, '".$nickname."', '".$password."', '".$address."')";

	// first page result
	echo '<div id="registeredpage">';
	require('logo.php');
	echo '<br /><br /><div class="top">';

	// execute query
	if ($mysql->query($sql) === TRUE) {
	echo 'Your account have been created.<br />Now, you can test it on the login page';
	} else {
		echo "Something goes wrong.<br /><br />Error: " . $sql . "<br />" . $mysql->error;
	}

	//	final page result
	echo '</div><br /><br />';
	echo '<div class="bottom">';
	echo '<a onclick="javascript:loadLoginPage()">» Back to the login page «</a>';
	echo '</div>';
	echo '</div>';

	// close mysql connection
	$mysql->close();

	// free memory
	unset($sql);
	unset($mysql);
	unset($server);
	unset($db);
	unset($pwd);
	unset($user);
	unset($nickname);
	unset($password);
	unset($address);

?>
