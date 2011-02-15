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
 * [Enter Class Description]
 *
 * @package		Todoyu
 * @subpackage	[Subpackage]
 */
class TodoyuFirstStepsWizardStepJobtypes extends TodoyuWizardStep {

	protected $default = 5;



	public function init() {

	}


	public function save(array $data) {
		$jobTypes	= TodoyuArray::assure($data['jobtype']);
		$jobTypes	= TodoyuArray::trim($jobTypes, true);

		$this->data	= $jobTypes;

		TodoyuDebug::printInFireBug($jobTypes, '$jobTypes');


		return false;
	}


	public function render() {
		$tmpl	= 'ext/firststeps/view/wizard-step-jobtypes.tmpl';
		$data	= array(
			'data'		=> $this->data,
			'default'	=> $this->default
		);

		TodoyuDebug::printInFireBug($data, 'data');

		return render($tmpl, $data);
	}


	//protected function

}

?>