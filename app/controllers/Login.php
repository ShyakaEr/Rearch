<?php 

/**
 * Signup class
 */
class Login extends Controller
{
	
	public function index()
	{
		$this->view('login',$data);
	}

}