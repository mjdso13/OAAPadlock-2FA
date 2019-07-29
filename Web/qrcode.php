<?php

/**
 * Generate a QR code
 *
 * This script will generate an Obyte QR code with the help of the PHPQRCode 
 * library. (phpqrcode.sourceforge.net)
 *
 * @file    qrcode.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

	header('Content-type: image/png'); // image header

	require('conf.php');
	include($qrcodelib);
	// outputs image directly into browser, as PNG stream
	QRcode::png($obyte_protocol . ":" . $aa_payment_address);
?>
