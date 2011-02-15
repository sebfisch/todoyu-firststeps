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
 * Assets (JS, CSS) requirements for firststeps extension
 *
 * @package		Todoyu
 * @subpackage	Firststeps
 */

Todoyu::$CONFIG['EXT']['firststeps']['assets'] = array(
	'js' => array(
		array(
			'file'		=> 'ext/firststeps/assets/js/Ext.js',
			'position'	=> 100
		),
		array(
			'file'		=> 'ext/firststeps/assets/js/Wizard.js',
			'position'	=> 101
		),
		array(
			'file'		=> 'ext/firststeps/assets/js/AutoExtendingList.js',
			'position'	=> 101
		)
	),
	'css' => array(
		array(
			'file'		=> 'ext/firststeps/assets/css/ext.css',
			'position'	=> 100
		),
		array(
			'file'		=> 'ext/firststeps/assets/css/wizard.css',
			'position'	=> 100
		)
	)
);

?>