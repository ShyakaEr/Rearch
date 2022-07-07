<?php 

/**
 * home class
 */
class Home extends Controller
{
	
	public function index()
	{
		// $db = new Database();
		// $db->query();
		$data="Yolla";
		$this->view('home',$data);
	}

}