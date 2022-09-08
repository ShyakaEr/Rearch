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
		$data['row']   = $row =  $user->first(['id'=>$id]);

		//Check whether Something has Posted and if row existed

		if($_SERVER['REQUEST_METHOD'] == "POST" && $row){
			
			$folder   = "uploads/images/";

			if(!file_exists($folder)){
				mkdir($folder,777,true);

				//Protected the folder image
				file_put_contents($folder."index.php","<?php //silence");
				file_put_contents("uploads/index.php","<?php //silence");
			}
			

			$allowed  = ['image/jpeg','image/png'];

			if(!empty($_FILES['image']['name'])){

				//Check Whether there is not error
				if($_FILES['image']['error']==0){

					//Check type of image
					if(in_array($_FILES['image']['type'],$allowed)){

						$destination = $folder.time().$_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'],$destination);

						$_POST['image'] = $destination;
					}else{
						$user->errors['image'] = "This file type is not allowed";
					}
				}else{
					$user->errors['image'] = "Could not uplaod image";
				}
			}
			$user->update($id,$_POST);
			redirect('admin/profile/'.$id);
		}
		$data['title'] = "Profile";
		$this->view('admin/profile',$data);
	}

}
?>