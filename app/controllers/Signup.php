<?php 

/**
 * Signup class
 */
class Signup extends Controller
{
	
	public function index()
	{

		$data['errors'] = [];
		$user           = new User();

		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			if($user->validate($_POST)){
				$_POST['role']      = "user";
				$_POST['create_at'] = date('Y-m-d H:i:s');
				$user->insert($_POST);
				message('Your Profile has successful created. Please Login');
				redirect('login');
		     }
		}

		$data['errors'] = $user->errors;
		$data['title']  = "Signup";
		$this->view('signup',$data);
	}

}