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
 * Firststeps wizard
 *
 * @package		Todoyu
 * @subpackage	Firststeps
 */
class TodoyuFirstStepsWizard extends TodoyuWizard {

	/**
	 * Initialize wizard with name
	 */
	public function __construct() {
		parent::__construct('firststeps');
	}


	/**
	 * Get name of first step in the wizard
	 *
	 * @return	String
	 */
	public function getFirstStep() {
		return 'start';
	}

}

?>