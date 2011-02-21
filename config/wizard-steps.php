<?php
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
 * Steps for the first steps wizard
 */
Todoyu::$CONFIG['EXT']['firststeps']['wizardsteps'] = array(
	array(
		'step'		=> 'start',
		'position'	=> 10,
		'class'		=> 'TodoyuFirstStepsWizardStepStart',
		'title'		=> 'firststeps.wizard.start.title',
		'info'		=> 'firststeps.wizard.start.info',
		'help'		=> 'firststeps.wizard.start.help'
	),
	array(
		'step'		=> 'jobtypes',
		'position'	=> 20,
		'class'		=> 'TodoyuFirstStepsWizardStepJobtypes',
		'title'		=> 'firststeps.wizard.jobtypes.title',
		'info'		=> 'firststeps.wizard.jobtypes.info',
		'help'		=> 'firststeps.wizard.jobtypes.help'

	),
	array(
		'step'		=> 'projectroles',
		'position'	=> 30,
		'class'		=> 'TodoyuFirstStepsWizardStepProjectroles',
		'title'		=> 'firststeps.wizard.projectroles.title',
		'info'		=> 'firststeps.wizard.projectroles.info',
		'help'		=> 'firststeps.wizard.projectroles.help'
	),
	array(
		'step'		=> 'activities',
		'position'	=> 40,
		'class'		=> 'TodoyuFirstStepsWizardStepActivities',
		'title'		=> 'firststeps.wizard.activities.title',
		'info'		=> 'firststeps.wizard.activities.info',
		'help'		=> 'firststeps.wizard.activities.help'
	),
	array(
		'step'		=> 'userroles',
		'position'	=> 50,
		'class'		=> 'TodoyuFirstStepsWizardStepUserroles',
		'title'		=> 'firststeps.wizard.userroles.title',
		'info'		=> 'firststeps.wizard.userroles.info',
		'help'		=> 'firststeps.wizard.userroles.help'
	),
	array(
		'step'		=> 'company',
		'position'	=> 60,
		'class'		=> 'TodoyuFirstStepsWizardStepUserroles',
		'title'		=> 'firststeps.wizard.company.title',
		'info'		=> 'firststeps.wizard.company.info',
		'help'		=> 'firststeps.wizard.company.help'
	),
	array(
		'step'		=> 'employees',
		'position'	=> 70,
		'class'		=> 'TodoyuFirstStepsWizardStepEmployees',
		'title'		=> 'firststeps.wizard.employees.title',
		'info'		=> 'firststeps.wizard.employees.info',
		'help'		=> 'firststeps.wizard.employees.help'
	),
	array(
		'step'		=> 'customers',
		'position'	=> 80,
		'class'		=> 'TodoyuFirstStepsWizardStepCustomers',
		'title'		=> 'firststeps.wizard.customers.title',
		'info'		=> 'firststeps.wizard.customers.info',
		'help'		=> 'firststeps.wizard.customers.help'
	),
	array(
		'step'		=> 'project',
		'position'	=> 90,
		'class'		=> 'TodoyuFirstStepsWizardStepProject',
		'title'		=> 'firststeps.wizard.project.title',
		'info'		=> 'firststeps.wizard.project.info',
		'help'		=> 'firststeps.wizard.project.help'
	),
	array(
		'step'		=> 'finish',
		'position'	=> 100,
		'class'		=> 'TodoyuFirstStepsWizardStepFinish',
		'title'		=> 'firststeps.wizard.finish.title',
		'info'		=> 'firststeps.wizard.finish.info',
		'help'		=> 'firststeps.wizard.finish.help'
	)

);

?>