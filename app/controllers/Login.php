<?php 

/**
 * Signup class
 */
class Login extends Controller
{
	
	public function index()
	{
		$data['errors'] = [];
		$data['title']  = 'Login';
		$user           = new User();

		if($_SERVER['REQUEST_METHOD'] == "POST"){

			//Validate Username
			$row = $user->first([
				'user_email'=>$_POST['user_email'],
			]);

			if($row){

				if($row->user_password === $_POST['user_password']){

					//Authenticate
					Auth::authenticate($row);
					redirect('home');
				}
			}
			$data['errors']['user_email']  = 'Wrong Email or Password';
		 }
		$this->view('login',$data);
	}

}