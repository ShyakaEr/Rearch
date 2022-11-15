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

			//Validate data
			$errors = $user->edit_validate($_POST,$id);

			$allowed  = ['image/jpeg','image/png'];

			if(!empty($_FILES['image']['name'])){

				//Check Whether there is not error
				if($_FILES['image']['error']==0){

					//Check type of image
					if(in_array($_FILES['image']['type'],$allowed)){

						$destination = $folder.time().$_FILES['image']['name'];
						move_uploaded_file($_FILES['image']['tmp_name'],$destination);

						//Resize The image
						resize_image($destination);

						$_POST['image'] = $destination;

						//Delete the older image
						if(file_exists($row->image)){
							unlink($row->image);
						}

					}else{
						$errors['image'] = "This file type is not allowed";
					}
				}else{
					$errors['image'] = "Could not uplaod image";
				}
			}

			//Update data
			$user->update($id,$_POST);

			if(empty($errors)){
				$arr['message'] = "Profile Update Successfully";
				//message("Profile Update Successfully");
				//redirect('admin/profile/'.$id);
			}else{
				$arr['message'] = "Please Correct these errors";
				$arr['errors']  = $errors;
			}
			echo json_encode($arr);
			die;
		}
		
		$data['title'] = "Profile";
		$data['errors']= $errors;
		
		$this->view('admin/profile',$data);
	}

	public function courses($action=null,$id=null){

		//Limit User Access 
		if(!Auth::logged_in()){
			redirect('login');
			message('Please login to view the admin section');
		}

		$data['action'] = $action;
		$data['id']     = $id;
		$user_id        = Auth::getId();

		//Define Model
		$category       = new Category_model();
		$course         = new Course_model();

		if($action =='add'){

			
			$data['categories'] = $category->findAll();

			if($_SERVER['REQUEST_METHOD'] == "POST"){

				//Validation
				$errors             = $course->validate($_POST);

				
				$_POST['create_at'] = date('Y-m-d');
				$_POST['user_id']   = $user_id;

				//Insert Data
				$course->insert($_POST);

				//Get Last Course Created By User
				$row = $course->first(['user_id'=>$user_id,'published'=>0]);

				//Check Error
				if(empty($errors)){
					if($row){
						redirect('admin/courses/edit/'.$row->id);
						message("Your Course was succesfuly Created ");
						
					}else{
						redirect('admin/courses');
						
					}
				}
			}
			$data['errors'] = $errors;
			
		}else{
			//View Courses
			$data['rows'] = $course->where(['user_id'=>$user_id]);
		}
		$this->view('admin/courses',$data);
	}

}
?>