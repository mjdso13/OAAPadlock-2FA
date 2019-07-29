<?php

/**
 * 2FA waiting page 
 *
 * This 2FA method will allow a user to unlock its session with
 * with an Obyte transaction.
 *
 * @file    oaa2fa_payment.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	// get user registration data
	$nickname = $_REQUEST["nickname"];
	$password = md5($_REQUEST["password"]);

	// load database constants
	require('conf.php');

	// Create mysql connection
	$mysql = new mysqli($server, $user, $pwd, $db);
	// Check mysql connection
	if ($mysql->connect_error) {
		 die("Connection failed: " . $mysql->connect_error);
	}

	// prepare query
	$sql = "SELECT `user_obyte_address` FROM `users` WHERE `user_nickname` = '".$nickname."' AND `user_password` = '".$password."';";

	// first page result
	echo '<div id="oaa2fapage">';
	require('logo.php');
	echo '<div class="top">';

	// execute query
	$result = $mysql->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			session_start(); // start user session
			$_SESSION["user"] = $row["user_obyte_address"]; // set user address
			$_SESSION["user_timestamp"] = time();
			$_SESSION["user_session_padlock"] = false; // false = locked, true = unlocked
			echo '<div id="address" class="invisible">'.$_SESSION["user"].'</div>';
		}

		echo '<div id="expiration">';
		echo 'Your session will stay locked<br />until you send us a 10kb payment.';
		echo '<br /><br />';
		echo 'you have 2 minutes to send the payment.';
		echo '<br />';
		echo '<a href="'.$obyte_protocol.':'.$aa_payment_address.'"><img src="qrcode.php" class="qrcode" /></a>';
		echo '<span class="warning">All payments received after the 2 minutes delay will be lost.</span>';
		echo '</div>';
		echo '</div>';

		echo '<div class="bottom">';
		echo '<a onclick="javascript:loadLoginPage()">» Cancel and back to the login page «</a>';
		echo '</div>';

	} else { // error with nickname or password
		echo 'You don\'t exist into the database<br />or you did a mistake somewhere.';
		echo '</div><br /><br />';
		echo '<div class="bottom">';
		echo '<a onclick="javascript:loadLoginPage()">» Back to the login page «</a>';
		echo '</div>';
	}
	echo '</div>';

	// close mysql connection
	$mysql->close();

	// free memory
	unset($sql);
	unset($row);
	unset($result);
	unset($mysql);
	unset($server);
	unset($db);
	unset($pwd);
	unset($user);
	unset($nickname);
	unset($password);

?>
