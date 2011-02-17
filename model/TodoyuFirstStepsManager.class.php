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
class TodoyuFirstStepsManager {

	public static function saveLabelRecords(array $newRecords, array $dbRecords, $table, $field = 'title', array $extraFields = array()) {
		$deleteRecords	= TodoyuArray::diffLeft($dbRecords, $newRecords);
		$addRecords		= TodoyuArray::diffLeft($newRecords, $dbRecords);

			// Delete removed records
		if( sizeof($deleteRecords) > 0 ) {
			$titleList	= TodoyuArray::implodeQuoted($deleteRecords);
			$where		= $field . ' IN(' . $titleList . ')';

			Todoyu::db()->setDeleted($table, $where);
		}

			// Add missing records
		foreach($addRecords as $record) {
			$data	= array(
				$field	=> $record
			);
			$data	= array_merge($data, $extraFields);
			TodoyuRecordManager::addRecord($table, $data);
		}
	}

}

?>