<?php

/**
 * Main Model Class
 */
class Model extends Database
{
	protected $table = "";

	public function insert($data){

		//remove unwanted column

		if(!empty($this->allowedColumns)){

			foreach ($data as $key => $value) {

				//check whether a particular key from ($_POST) is inside in our allowedColumns

				if(!in_array($key, $this->allowedColumns)){

					unset($data[$key]);
				}
			}
		}

		//Get the remaining Keys from data to be inserted

		$keys   = array_keys($data);
		$query  = "INSERT INTO " . $this->table;
		$query .= " (".implode(",",$keys) .") VALUES(:".implode(",:",$keys) .")";

		//run query

		$this->query($query,$data);
	}
}