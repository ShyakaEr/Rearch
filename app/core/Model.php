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

	public function where($data){

		$keys = array_keys($data);
		$query= "select * from ".$this->table." where ";

		//For Into Keys

		foreach($keys as $key){

			$query .= $key . "=:" . $key . " && ";
		}

		//Remove the &&

		$query = trim($query, "&& ");
		$result=$this->query($query,$data);

		if(is_array($result)){

			return $result;
		}

		return false;
	}

	public function first($data){

		$keys = array_keys($data);
		$query= "select * from ".$this->table." where ";

		//For Into Keys

		foreach($keys as $key){

			$query .= $key . "=:" . $key . " && ";
		}

		//Remove the &&

		$query  = trim($query, "&& ");
		$query .= " order by id desc limit 1";
		$result = $this->query($query,$data);
		if(is_array($result)){

			return $result[0];
		}

		return false;
	}
}