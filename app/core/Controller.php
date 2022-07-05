<?php

/**
 * Main Controller
 */
class Controller
{
	
	public function view($view,$data = []){

		extract($data);
		$filename = "../app/views/".$view.".view.php";
		if(file_exists($filename)){
			require $filename;
		}else{
			echo "We could not find view file :". $filename;
		}
	}
}