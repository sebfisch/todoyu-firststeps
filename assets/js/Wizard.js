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

/**
 * Firststeps wizard
 */
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
//				this.markLatestItem();
				this.initEmployees();
				break;

			case 'customers':
				this.initCustomers();
				break;

			case 'project':
				this.initProject();
				break;
		}
	},


//	markLatestItem: function() {
//		var idLatestItem = $('wizard-form').down('ul.list').select('li').collect(function(item){
//			return parseInt(item.id.split('-').last(), 10);
//		}).max();
//
//		$('item-' + idLatestItem).setStyle({
//			backgroundColor: '#FF0'
//		});
//	},



	/**
	 * Initialize auto extending list
	 *
	 * @param	{String}	listClass
	 */
	initAutoExtendingList: function(listClass) {
		var list	= $('wizard').down('ul.' + listClass);

		new Todoyu.AutoExtendingList(list);
	},



	/**
	 * Initialize remove buttons. Add callback
	 *
	 * @param	{Function}	callback
	 */
	initRemoveButtons: function(callback) {
		Todoyu.Wizard.getForm().down('ul.list').select('.remove').each(function(remove){
			remove.on('click', 'li', callback);
		}, this);
	},



	/**
	 * Initialize employee setp
	 */
	initEmployees: function() {
		Todoyu.Wizard.setNoSave(true);

		this.initRemoveButtons(this.removeEmployee.bind(this));
	},



	/**
	 * Add new employee
	 */
	addEmployee: function() {
		Todoyu.Wizard.setNoSave(false);
		Todoyu.Wizard.submit('');
	},



	/**
	 * Remove an employee
	 *
	 * @param	{Event}		event
	 * @param	{Element}	element
	 */
	removeEmployee: function(event, element) {
		var idPerson	= element.id.split('-').last();
		var name		= element.innerHTML.stripTags();

		if( confirm("Remove employee?\n\n" + name) ) {
			var url		= Todoyu.getUrl('firststeps', 'ext');
			var options	= {
				parameters: {
					action: 'removeEmployee',
					person: idPerson
				},
				onComplete: function(response) {
					Effect.BlindUp(element, {
						afterFinish: function() {
							element.remove();
						}
					});
				}
			};

			Todoyu.send(url, options);
		}
	},



	/**
	 * Initialize customer step
	 */
	initCustomers: function() {
		Todoyu.Wizard.setNoSave(true);
		this.initRemoveButtons(this.removeCustomer.bind(this));
	},



	/**
	 * Remove a customer
	 *
	 * @param	{Event}		event
	 * @param	{Element}	element
	 */
	removeCustomer: function(event, element) {
		var idCompany	= element.id.split('-').last();
		var name		= element.innerHTML.stripTags();

		if( confirm("Remove company?\n\n" + name) ) {
			var url		= Todoyu.getUrl('firststeps', 'ext');
			var options	= {
				parameters: {
					action: 'removeCompany',
					company: idCompany
				},
				onComplete: function(response) {
					Effect.BlindUp(element, {
						afterFinish: function() {
							element.remove();
						}
					});
				}
			};

			Todoyu.send(url, options);
		}
	},



	/**
	 * Initialize project step
	 */
	initProject: function() {
		this.initRemoveButtons(this.removeAssignedPerson.bind(this));
	},



	/**
	 * Add a person to the project
	 */
	addPerson: function() {
		Todoyu.Wizard.submit('', this.onPersonAdded.bind(this));
	},



	/**
	 * Handler when person was added
	 *
	 * @param	{Ajax.Response}	response
	 */
	onPersonAdded: function(response) {
		$('data-field-id-person').selectedIndex = -1;
		$('data-field-id-role').selectedIndex = -1;
	},



	/**
	 * Remove assigned person from project
	 *
	 * @param	{Event}		event
	 * @param	{Element}	element
	 */
	removeAssignedPerson: function(event, element) {
		var idPerson	= element.id.split('-').last();
		var name		= element.innerHTML.stripTags();

		if( confirm("Remove assigned person from project?\n\n" + name) ) {
			var url		= Todoyu.getUrl('firststeps', 'ext');
			var options	= {
				parameters: {
					action: 'removeAssignedPerson',
					project: 1,
					person: idPerson
				},
				onComplete: function(response) {
					Effect.BlindUp(element, {
						afterFinish: function() {
							element.remove();
						}
					});
				}
			};

			Todoyu.send(url, options);
		}
	}

};