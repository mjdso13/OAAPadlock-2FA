<?php

/**
 * Form to create an new account
 *
 * User will fill this form to create a new account
 *
 * @file    register.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	require('./destroy_session.php');

	echo '<div id="registerpage">';

	require('logo.php');

	echo '<div class="top">';
	echo '<label for="nickname"><b>Nickname</b></label>';
	echo '<input type="text" placeholder="Type your nickname" name="nickname" required onkeyup="isFieldEmpty(\'register\')" id="nickname">';
	echo '<label for="pwd"><b>Password</b></label>';
	echo '<input type="password" placeholder="Type your password" name="pwd" required onkeyup="isFieldEmpty(\'register\')" id="pwd">';
	echo '<label for="address"><b>Obyte address</b></label>';
	echo '<input type="text" placeholder="Type your Obyte address" name="address" required onkeyup="isFieldEmpty(\'register\')" id="address">';
	echo '<button type="submit" disabled onclick="javascript:loadRegisteredPage()" id="submit">Register</button>';
	echo '</div>';

	echo '<div class="bottom" style="text-align:center;">';
	echo '<a onclick="javascript:loadLoginPage()">» Cancel registration and back to the login page «</a>';
	echo '</div>';

	echo '</div>';
?>
