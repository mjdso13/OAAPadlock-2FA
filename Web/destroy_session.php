<?php

/**
 * Destroy user session 
 *
 * @file    destroy_session.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	// remove all session variables
	session_unset();
	// destroy the session
	session_destroy(); 

?>
