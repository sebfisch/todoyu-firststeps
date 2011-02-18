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
class TodoyuFirstStepsWizardStepCompany extends TodoyuFirstStepsWizardStep {

	protected function init() {
		$this->table	= 'ext_contact_company';
		$this->formXml	= 'ext/firststeps/config/form/company.xml';
	}


	public function save(array $data) {
		$form	= $this->getForm($data);

		if( $form->isValid() ) {
			$companyData	= $form->getStorageData();

			$this->saveCompany($companyData);

			return true;
		} else {
			$this->data = $data;

			return false;
		}

	}


	public function renderContent() {
		if( $this->data === null ) {
			$this->data = $this->getCompanyData();
		}

		return $this->getForm($this->data)->renderContent();
	}



	private function getCompanyData() {
		$company	= $this->getCompany();
		$addresses	= $company->getAddresses();
		$mainAddress= TodoyuArray::assure($addresses[0]);

		$data	= $company->getTemplateData();

		$data['street']	= $mainAddress['street'];
		$data['zip']	= $mainAddress['zip'];
		$data['city']	= $mainAddress['city'];

		return $data;
	}


	/**
	 * @return TodoyuCompany
	 */
	private function getCompany() {
		return TodoyuCompanyManager::getCompany(1);
	}







	private function saveCompany(array $submittedData) {
		$data	= array(
			'title'	=> $submittedData['title']
		);

		TodoyuRecordManager::updateRecord($this->table, 1, $data);

		$addresses	= $this->getCompany()->getAddresses();
		$mainAddress= TodoyuArray::assure($addresses[0]);
		$idAddress	= intval($mainAddress['id']);

		$data	= array(
			'street'	=> $submittedData['street'],
			'zip'		=> $submittedData['zip'],
			'city'		=> $submittedData['city']
		);

		TodoyuAddressManager::updateAddress($idAddress, $data);
	}

}

?>