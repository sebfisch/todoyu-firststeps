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
class TodoyuFirstStepsWizardStepActivities extends TodoyuFirstStepsWizardStep {

	protected function init() {
		$this->table = 'ext_project_worktype';
	}


	public function save(array $data) {
		$activities	= TodoyuArray::assure($data['activity']);
		$activities	= TodoyuArray::trim($activities, true);

		$this->saveActivities($activities);

		$this->data	= $activities;

		return true;
	}


	public function renderContent() {
		if( $this->data === null ) {
			$this->data = $this->getActivities();
		}

		return TodoyuFirstStepsRenderer::renderItemList($this->data, 'activity', 'activities');
	}


	private function getActivities() {
		$activities	= TodoyuWorktypeManager::getAllWorktypes();

		return TodoyuArray::getColumn($activities, 'title');
	}


	private function saveActivities(array $submittedActivities) {
		$dbActivities	= $this->getActivities();

		TodoyuFirstStepsManager::saveLabelRecords($submittedActivities, $dbActivities, $this->table);
	}

}

?>