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

				$_POST['role']          = "user";
				$_POST['create_at']     = date('Y-m-d H:i:s');
				$_POST['user_password'] = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

				$errors =  $user->validate($_POST);

				if(empty($errors)){

					$user->insert($_POST);
					message('Your Profile has successful created. Please Login');
					redirect('login');

				}
			
		}

		$data['errors'] = $errors;
		$data['title']  = "Signup";
		$this->view('signup',$data);
	}

}