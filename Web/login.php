<?php

/**
 * Login page 
 *
 * First factor form to log into the service.
 *
 * @file    login.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	require('./destroy_session.php');

	echo '<div id="loginpage">';

	require('logo.php');

	echo '<div class="top">';
	echo '<label for="nickname"><b>Nickname</b></label>';
	echo '<input type="text" placeholder="Type your nickname" name="nickname" required onkeyup="isFieldEmpty(\'login\')" id="nickname">';
	echo '<label for="pwd"><b>Password</b></label>';
	echo '<input type="password" placeholder="Type your password" name="pwd" required onkeyup="isFieldEmpty(\'login\')" id="pwd">';
	echo '<button type="submit" disabled id="submit" onclick="javascript:loadOaa2faPage()" >Login</button>';
	echo '</div>';

	echo '<div class="bottom">';
	echo '<table style="width:100%;">';
	echo '<tr>';
	echo '<td><a onclick="javascript:loadRegisterPage()">» New user? Register now «</a></td>';
	echo '<td style="text-align:right;"><a onclick="javascript:loadPasswordLostPage()">» Password lost? «</a></td>';
	echo '</tr>';
	echo '</table>';
	echo '</div>';

	echo '</div>';
?>
