/**
 * @file A class to handle and process responses from an Obyte autonomous agent.
 * @author Marco J. Dos Santos Oliveira - @mjdso13
 * @version 1.0.0
 * @license MIT
**/

'use strict';

/**
 * @classdesc The AARequest class handles and process responses from an Obyte autonomous agent.
**/

/**
 * @description Private variables of the AARequest class
**/

/**
 * @private
 * @member {object} address
 * @description Address of the AA who emitted the response.
 * @since 1.0.0
**/

let address = '';

/**
 * @private
 * @member {object} argument
 * @description Argument/response of the AA.
 * @since 1.0.0
**/

let argument = '';

/**
 * @private
 * @member {object} type
 * @description Type of the event.
 * @since 1.0.0
**/

let type = '';

/**
 * @description Private functions of the AARequest class
**/

/**
 * A class module to handles and process responses from an Obyte autonomous agent.
 * @exports AAResponse
**/

module.exports = class AAResponse {

/**
 * AARequest constructor function.
 * @public
 * @class
 * @param {string} aa_address - autonomous agent address
 * @param {string} response - autonomous agent response/argument 
 * @param {string} event - type of the incoming event 
 * @return {object}
 * @since 1.0.0
**/	

	constructor (aa_address, response, event) {
		address = aa_address;
		argument = response;
		type = event;
	}

/**
 * @public
 * @function processResponse
 * @description Process the response
 * @return {void}
 * @since 1.0.0
**/

	processResponse() {
		switch (type) {
			/*
			case 'aa_response':
				break;
			case 'aa_response_to_unit':
				break;
			case 'aa_response_to_address':
				break;
			*/
			case 'aa_response_from_aa':

				const http = require('http');

				http.get({
					hostname: 'localhost',
					port: 80,
					path: '/obytebots/oaa2fa/add_user_payment.php?address='+argument.trigger_address,
					agent: false  // Create a new agent just for this one request
				}, (res) => {
				  // Do stuff with response
				});

				 // free memory
				http = '';

				break;
			default:
				console.log("Something goes wrong...");

		}
	}
}
