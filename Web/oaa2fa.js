/**
 * External javascript file
 *
 * All javascript function are store into this file.
 * Mainly Ajax functions.
 *
 * @file    oaa2fa.js
 * @author  Marco J. Dos Santos Oliveira (@mjdso13)
 * @license MIT
 *
 */

//test payment 
var isPaid = false;
//timer
var timer = 0;
var stopwatch = 0;
var timerLimit = 120; // 120 seconds
var timerPeriod = 5; // 5 seconds


// simple ajax request to get pages
function ajax(domObjectId, uri) {
		if (window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
		} else {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
		}
		xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				document.getElementById(domObjectId).innerHTML = this.responseText;
			}
		};

		xmlhttp.open("GET",uri, true);
		xmlhttp.send();
}

// ajax request to check payment
function checkPayment() {
		if (window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
		} else {
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
		}
		xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==202) {
				isPaid = true;
				loadConnectedPage();
			}
		};

		xmlhttp.open(
			"GET",
			"check_payment.php?address="+document.getElementById("address").textContent, 
			true
		);
		xmlhttp.send();
}

// test if form fields are empty and activate submit button
function isFieldEmpty(page) {
	if (page === "login") { // login page
		document.getElementById("submit").disabled = 
			(document.getElementById("nickname").value.length !== 0 
			&& document.getElementById("pwd").value.length !== 0) ? false : true;
	} else { // register page
		document.getElementById("submit").disabled = 
			(document.getElementById("nickname").value.length !== 0 
			&& document.getElementById("pwd").value.length !== 0
			&& document.getElementById("address").value.length !== 0) ? false : true;
	}
}

// load login page
function loadLoginPage() {
		uri = "login.php";
		ajax ("content", uri);
}

// load register page
function loadRegisterPage() {
		uri = "register.php";
		ajax ("content", uri);
}

// load registered page
function loadRegisteredPage() {
		uri = "registered.php?nickname="+document.getElementById("nickname").value
			+"&password="+document.getElementById("pwd").value
			+"&address="+document.getElementById("address").value;
		ajax ("content", uri);
}

// load password lost page
function loadPasswordLostPage() {
		uri = "lost.php";
		ajax ("content", uri);
}

function verifyUserPayment() {

	checkPayment();
	
	stopwatch += timerPeriod;

	if (isPaid === false) {
		if (stopwatch === timerLimit) {
			stopwatch = 0;
			uri = "expired.php";
			ajax ("expiration", uri);
		} else {
			timer = setTimeout(verifyUserPayment, timerPeriod*1000);
		}
	}
	
}

// load Obyte autonomous agent 2fa page
function loadOaa2faPage() {
		uri = "oaa2fa_payment.php?nickname="+document.getElementById("nickname").value
			+"&password="+document.getElementById("pwd").value;
		ajax ("content", uri);

		timer = setTimeout(verifyUserPayment, timerPeriod*1000);
}

// load connected page
function loadConnectedPage() {
		clearTimeout(timer);
		timer = 0;
		uri = "connected.php?address="+document.getElementById("address").textContent;
		ajax ("content", uri);		
		stopwatch = 0;
		isPaid = false;
}
