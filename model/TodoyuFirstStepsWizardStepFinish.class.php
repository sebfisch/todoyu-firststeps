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
 * Wizard step: finish
 *
 * @package		Todoyu
 * @subpackage	Firststeps
 */
class TodoyuFirstStepsWizardStepFinish extends TodoyuFirstStepsWizardStep {

	/**
	 * Nothing to save
	 *
	 * @param	Array	$data
	 * @return	Boolean
	 */
	public function save(array $data) {
		return true;
	}



	/**
	 * Render content
	 *
	 * @return	String
	 */
	public function getContent() {
		$tmpl	= 'ext/firststeps/view/wizard-step-finish.tmpl';
		$data	= array();

		return render($tmpl, $data);
	}

}

?>