<?php 

/**
 * Signup class
 */
class Signup extends Controller
{
	
	public function index()
	{

		
		$user  = new User();

		if($user->validate($_POST)){
			$_POST['role']      = "user";
			$_POST['create_at'] = date('Y-m-d H:i:s');
			$user->insert($_POST);
		}
		$this->view('signup');
	}

}