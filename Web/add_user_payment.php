<?php

/**
 * Add the user payment in the padlock pool
 *
 * If the user Obyte address exists in the database, the payment will
 * will added into the padlock pool
 *
 * @file    add_user_payment.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	// get user registration data
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
	$sql = "INSERT INTO `padlock_pool` (`pool_id`,`pool_user_id`, `pool_paid_timestamp`) VALUES (NULL, (SELECT `user_id` FROM `users` WHERE `user_obyte_address` = '".$address."'), UNIX_TIMESTAMP()+120)";

	// execute query
	$mysql->query($sql);
	/*if ($mysql->query($sql) !== TRUE) {
		echo "Error: " . $sql . "<br>" . $mysql->error;
	}*/

	// close mysql connection
	$mysql->close();

	// free memory
	unset($sql);
	unset($mysql);
	unset($server);
	unset($db);
	unset($pwd);
	unset($user);
	unset($address);

?>
