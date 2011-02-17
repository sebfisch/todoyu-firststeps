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
 * @subpackage	Firststeps
 */
class TodoyuFirstStepsWizardStepProject extends TodoyuFirstStepsWizardStep {

	/**
	 * Initialize step
	 */
	protected function init() {
		$this->table	= 'ext_contact_company';
		$this->formXml	= 'ext/firststeps/config/form/project.xml';
	}



	/**
	 *
	 * @param array $data
	 * @return bool
	 */
	public function save(array $data) {
		$form	= $this->getForm($data);

		if( $form->isValid() ) {
			$projectData	= $form->getStorageData();

			$this->saveProject($projectData);

			return true;
		} else {

			return false;
		}
	}


	public function renderContent() {
		if( $this->data === null ) {
			$this->data = $this->getProjectData();
		}

		$this->getForm()->setUseRecordID(false);

		$tmpl	= 'ext/firststeps/view/form-with-list.tmpl';
		$data	= array(
			'items'	=> $this->getListItems(),
			'form'	=> $this->getForm($this->data)->renderContent()
		);

		TodoyuDebug::printInFireBug($this->data, 'data');


		return render($tmpl, $data);
	}



	private function getListItems() {
		$persons	= $this->getProjectUsers();
		$items		= array();

		foreach($persons as $person) {
			$items[] = array(
				'id'	=> $person['id'],
				'label'	=> $person['firstname'] . ' ' . $person['lastname'] . ', ' . $person['rolelabel']
			);
		}

		return $items;
	}


	private function getProjectUsers() {
		return TodoyuProjectManager::getProjectPersons(1);
	}


	private function getProjectData() {
		if( ! $this->hasProjects() ) {
			$this->createFirstProjectPreset();
		}

		$project	= TodoyuProjectManager::getProject(1);

		return $project->getTemplateData();
	}


	private function createFirstProjectPreset() {
		$data	= array(
			'title'			=> 'My First Project',
			'id_company'	=> 1
		);

		return TodoyuProjectManager::addProject($data);
	}


	private function hasProjects() {
		return Todoyu::db()->queryHasResult('SELECT id FROM ext_project_project LIMIT 1');
	}



	private function saveProject(array $submittedData) {
		$data	= array(
			'title'			=> $submittedData['title'],
			'description'	=> $submittedData['description'],
			'id_company'	=> intval($submittedData['id_company']),
			'date_start'	=> $submittedData['date_start'],
			'date_end'		=> $submittedData['date_end'],
			'date_deadline'	=> $submittedData['date_end'],
		);

		$idProject	= TodoyuProjectManager::updateProject(1, $data);

		$idPerson	= intval($submittedData['id_person']);
		$idRole		= intval($submittedData['id_role']);

		if( $idPerson > 0 && $idRole > 0 ) {
			TodoyuProjectManager::addPerson(1, $idPerson, $idRole);
		}

		return $idProject;
	}

}

?>