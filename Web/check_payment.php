<?php

/**
 * Check payment
 *
 * Check if the user paid to unlock its session
 *
 * @file    check_payment.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	// get request data
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
	$sql = "SELECT `pool_id` FROM `padlock_pool` WHERE `pool_user_id` = (SELECT `user_id` FROM `users` WHERE `user_obyte_address` = '".$address."') LIMIT 1";

	// execute query
	$result = $mysql->query($sql);
	if ($result->num_rows > 0) {
		session_start();
		$_SESSION['user_session_padlock'] = true;
		http_response_code(202); // send http code : accepted
		$sql = "DELETE FROM `padlock_pool` WHERE `padlock_pool`.`pool_id` = ".$result->fetch_assoc()['pool_id'].";";
		$mysql->query($sql);
	} else {
		http_response_code(402); // send http code : payment required
	}

	// close mysql connection
	$mysql->close();

	// free memory
	unset($sql);
	unset($result);
	unset($mysql);
	unset($server);
	unset($db);
	unset($pwd);
	unset($user);
	unset($address);
?>
