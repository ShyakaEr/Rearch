<?php 

/**
 * Signup class
 */
class Signup extends Controller
{
	
	public function index()
	{
		$this->view('signup',$data);
	}

}