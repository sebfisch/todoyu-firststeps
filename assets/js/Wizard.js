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

Todoyu.Ext.firststeps.Wizard = {

	/**
	 * Open first steps wizard
	 */
	open: function() {
		Todoyu.Wizard.open('firststeps', this.onLoaded.bind(this));
	},



	/**
	 * Handler when wizard was loaded
	 * Initialize event handlers
	 *
	 * @param	{String}		wizardName
	 * @param	{Ajax.Response}	response
	 */
	onLoaded: function(wizardName, response) {
		switch( Todoyu.Wizard.getStepName() ) {
			case 'jobtypes':
			case 'projectroles':
			case 'activities':
			case 'userroles':
				this.initAutoExtendingList(Todoyu.Wizard.getStepName());
				break;

			case 'company':
				break;

			case 'employees':
			case 'customers':
				Todoyu.Wizard.setNoSave(true);
				break;
		}
	},



	/**
	 * Initialize auto extending list
	 *
	 * @param	{String}	listClass
	 */
	initAutoExtendingList: function(listClass) {
		var list	= $('wizard').down('ul.' + listClass);

		new Todoyu.AutoExtendingList(list);
	},

	addEmployee: function() {
		Todoyu.Wizard.setNoSave(false);
		Todoyu.Wizard.submit('');
	},

	addPerson: function() {
		Todoyu.Wizard.submit('', this.onPersonAdded.bind(this));
	},

	onPersonAdded: function(response) {
		$('data-field-id-person').selectedIndex = -1;
		$('data-field-id-role').selectedIndex = -1;
	}

};