<?php

/**
 * 
 */
class Admin extends Controller 
{
	
	public function index(){
		
		//Limit User Access 
		if(!Auth::logged_in()){
			redirect('login');
			message('Please login to view the admin section');
		}

		$data['title'] = "Dashboard";
		$this->view('admin/dashboard',$data);
	}

	public function profile($id=null){

		//Limit User Access 
		if(!Auth::logged_in()){
			redirect('login');
			message('Please login to view the admin section');
		}

		$id            = $id ?? Auth::getId();
		$user          = new User();
		$data['row']   = $user->first(['id'=>$id]);
		$data['title'] = "Profile";
		$this->view('admin/profile',$data);
	}

}
?>