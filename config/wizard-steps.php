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

Todoyu::$CONFIG['EXT']['firststeps']['wizardsteps'] = array(
	array(
		'step'		=> 'start',
		'position'	=> 10,
		'label'		=> 'firststeps.wizard.start.label',
		'class'		=> 'TodoyuFirstStepsWizardStepStart'
	),
	array(
		'step'		=> 'jobtypes',
		'position'	=> 20,
		'label'		=> 'firststeps.wizard.jobtypes.label',
		'class'		=> 'TodoyuFirstStepsWizardStepJobtypes'
	),
	array(
		'step'		=> 'projectroles',
		'position'	=> 30,
		'label'		=> 'firststeps.wizard.projectroles.label',
		'class'		=> 'TodoyuFirstStepsWizardStepProjectroles'
	)

);

?>