<?php

/**
 * Unauthorized access page
 *
 * All attempts to access to restricted areas are redirected here.
 *
 * @file    unauthorized.php
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

require('./destroy_session.php');

$doctype = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" />';

$html_open = '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US">';
$html_close = '</html>';

$head_open = '<head>';
$head_close = '</head>';

$meta_title = '<title>Obyte Autonomous Agent 2FA demo</title>';
$meta_description = '<meta name="description" content="Obyte Autonomous Agent 2FA Padlock demo" />';
$meta_content_type = '<meta http-equiv="content-type" content="text/html; charset=UTF-8" />';
$meta_language = '<meta http-equiv="content-language" content="en-US" />';
$meta_keywords = '<meta name="keywords" content="obyte, autonomous, agent, 2fa, padlock" />';
$meta_robots = '<meta name="robots" content="none" />';
$meta_author = '<link rel="author" href="mailto:marco.dossantosoliveira@sunrise.ch" xml:lang="en-US" title="Marco J. Dos Santos Oliveira" />';

$css = '<link rel="stylesheet" type="text/css" href="oaa2fa.css">';

$head	= $head_open
	. $meta_title
	. $meta_description
	. $meta_content_type
	. $meta_language
	. $meta_robots
	. $meta_author
	. $css
	. $head_close;


$body_open = '<body>';
$body_close = '</body>';

$javascript_src = '<script src="oaa2fa.js"></script> ';

$body_title = '<h3>Obyte Autonomous Agent 2FA Padlock demo</h3>';
$body_content =  '<div id="content">'
	. '<div id="unauthorizedpage">'
	. '<div>'
	. '<img src="oaa2fa_logo.png" alt="OAA2FA Padlock logo" class="logo">'
	. '</div>'
	. '<br /><br />'
	. '<div class="top">'
	.'<div id="content">'
	. 'Access unauthorized!'
	. '</div>'
	. '<br /><br />'
	. '<div class="bottom">'
	. '<a href="index.php">» Back to the login page «</a>'
	. '</div>'
	. '</div>'
	. '</div>';

$body	= $body_open
	. $javascript_src
	. $body_title
	. $body_content
	. $body_close;

$page = $doctype 
	. $html_open 
	. $head 
	. $body 
	. $html_close;

echo $page;

?>
