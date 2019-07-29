<?php

/**
 * Inform user of delay expiration 
 *
 * Content to display if the user doesn't pay to unlock its session in the delay.
 *
 * @file    expired.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	require('./destroy_session.php');

	echo "The period to send the payment has expired.";
	echo "<br /><br />";
	echo "All payments received from now will be ignored.";
	echo "<br />";
	echo "Obviously, you lost your money.";
	echo "<br /><br />";

?>
