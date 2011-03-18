/****************************************************************************
 * todoyu is published under the BSD License:
 * http://www.opensource.org/licenses/bsd-license.php
 *
 * Copyright (c) 2011, snowflake productions GmbH, Switzerland
 * All rights reserved.
 *
 * This script is part of the todoyu project.
 * The todoyu project is free software; you can redistribute it and/or modify
 * it under the terms of the BSD License.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the BSD License
 * for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script.
 *****************************************************************************/

Todoyu.Ext.firststeps = {

	init: function() {
		//this.Wizard.open();
		if( Todoyu.isLoggedIn() ) {
			this.addDemoButton();
		}
	},



	/**
	 * Add demo button for testing
	 */
	addDemoButton: function() {
		var button	= new Element('div',{
			id: 'firststepswizard-button'
		}).update('Open FirstSteps Demo Wizard');

		button.on('click', this.Wizard.open.bind(this.Wizard));

		document.body.insert(button);
	}

};