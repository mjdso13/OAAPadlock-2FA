<?php

/**
 * Password lost page 
 *
 * To develop...
 *
 * @file    lost.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	require('./destroy_session.php');

	echo '<div id="lostpage">';

	require('logo.php');

	echo '<br /><br />';
	echo '<div class="top">';
	echo 'I don\'t care, reset your database yourself. 🤣';
	echo '</div>';
	echo '<br /><br />';
	echo '<div class="bottom">';
	echo '<a onclick="javascript:loadLoginPage()">» Back to the login page «</a>';
	echo '</div>';

	echo '</div>';
?>
