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
class TodoyuFirstStepsWizardStepProjectroles extends TodoyuFirstStepsWizardStep {


	protected function init() {
		$this->table = 'ext_project_role';
	}


	public function save(array $data) {
		$projectRoles	= TodoyuArray::assure($data['projectrole']);
		$projectRoles	= TodoyuArray::trim($projectRoles, true);

		$this->saveProjectRoles($projectRoles);

		$this->data	= $projectRoles;

		return true;
	}


	public function renderContent() {
		if( $this->data === null ) {
			$this->data = $this->getProjectRoles();
		}

		return TodoyuFirstStepsRenderer::renderItemList($this->data, 'projectrole', 'projectroles');
	}


	private function getProjectRoles() {
		$projectRoles	= TodoyuProjectroleManager::getProjectroles(true);

		return TodoyuArray::getColumn($projectRoles, 'title');
	}


	private function saveProjectRoles(array $submittedProjectRoles) {
		$dbProjectRoles	= $this->getProjectRoles();

		TodoyuFirstStepsManager::saveLabelRecords($submittedProjectRoles, $dbProjectRoles, $this->table);
	}

}

?>