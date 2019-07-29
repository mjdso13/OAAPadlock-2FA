/**
 * @file A class to deploy an Obyte bot.
 * @author Marco J. Dos Santos Oliveira - @mjdso13
 * @version 1.0.0
 * @license MIT
**/

'use strict';
// load Obyte libraries
const conf = require('ocore/conf.js');
const eventBus = require('ocore/event_bus.js');
// useful to pause the terminal noise
const headlessWallet = require('headless-obyte');

// load class
const AAResponse = require('./aaresponse'); // AAResponse class

/**
 * @classdesc The Bot class groups the Obyte listeners
**/

/**
 * @description Private variables of the Bot class
**/

/**
 * @private
 * @member {string} trigger_unit
 * @description The unit that triggers the AA event
 * @since 1.0.0
**/

//let trigger_unit = "";

/**
 * @private
 * @member {string} trigger_address
 * @description The user address that triggers the AA event
 * @since 1.0.0
**/

//let trigger_address = "";

/**
 * @private
 * @member {string} aa_address
 * @description The AA address that triggers the AA event
 * @since 1.0.0
**/

let aa_address = "MCPQOPFI7IWSM5O6T7P3PK27FX7FYLRW";

/**
 * @description Private functions of the Bot class
**/

/**
 * A class module to deploy an Obyte bot
 * @exports Bot
**/

module.exports = class Bot {
/**
 * Bot constructor function.
 * @public
 * @class
 * @return {object}
 * @since 1.0.0
 */
	constructor() {

		// Autonomous Agent events works only with full nodes

		/*

		// Waiting for any autonomous agent response	
		eventBus.on('aa_response, (objAAResponse) => {
			// react to the AA event
		});

		// Waiting for an AA response to a specific unit	
		eventBus.on('aa_response_to_unit-' + trigger_unit, (objAAResponse) => {
			// react to the event
		});

		// Waiting for an AA response to a specific address	
		eventBus.on('aa_response_to_address-' + trigger_address, (objAAResponse) => {
			// react to the event
		});

		*/	

		// Waiting for responses from a specific autonomous agent
		eventBus.on('aa_response_from_aa-' + aa_address, (objAAResponse) => {

			let response; // create a local variable

			response = new AAResponse( // create a new AAResponse object
				aa_address, // AA address
				objAAResponse, // AA response
				'aa_response_from_aa' // AA event type
			); 		

			response.processResponse(); // process the response

			response.__proto__ = response = null; // unload object from memory

		});

	}
}
