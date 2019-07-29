<?php

/**
 * Configuration page 
 *
 * A file to store the service configuration :
 * - protocol, payment address, qrcode library path, mysql constants, etc...
 *
 * @file    conf.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	// Obyte data
	$obyte_protocol = "obyte-tn";
	$aa_payment_address = "MCPQOPFI7IWSM5O6T7P3PK27FX7FYLRW?amount=10000&asset=base";

	//PHPQRCode library path
	$qrcodelib = "./lib/phpqrcode/qrlib.php";

	// MySQL Database constants
	$server = "localhost";
	$user = "user"; // database username
	$pwd = "pwd"; // database password
	$db = "oaa2fa";

?>
