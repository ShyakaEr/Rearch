<?php 

/**
 * Users Model
 */
class User extends Model
{
	public    $errors         = [];
	protected $table          = "users";
	protected $allowedColumns = [

		'first_name',
		'last_name',
		'user_email',
		'role',
		'user_password',
		'create_at',
		'about',
		'company',
		'job',
		'country',
		'address',
		'phone',
		'slug',
		'image',
		'facebook_link',
		'twitter_link',
		'instagram_link',
		'linkedin_link',
	]; 
	
	public function validate($data)
	{
		$errors = [];

		//Check first_name
		if(empty($data['first_name'])){
			$errors['first_name'] = "First name is required";
		}
		else
		if(!preg_match("/^[a-zA-Z]+$/",trim($data['first_name']))){
			$errors['first_name'] = "First name can only have Letters Without Spaces";
		}

		//Check last_name
		if(empty($data['last_name'])){
			$errors['last_name'] = "Last name is required";
		}else
		if(!preg_match("/^[a-zA-Z]+$/",trim($data['last_name']))){
			$errors['last_name'] = "First name can only have Letters Without Spaces";
		}

		//Check Email
		if(!filter_var($data['user_email'],FILTER_VALIDATE_EMAIL)){
			$errors['user_email'] = "Email is not Valid";
		}else
		if($this->where(['user_email' => $data['user_email']])){
			$errors['user_email'] = "That Email Already Existed";
		}

		if(empty($data['user_password'])){
			$errors['user_password'] = 'A Password is required';
		}

		if($data['user_password'] !== $data['confirm_password']){
			$errors['user_password'] = 'Password do not match';
		}else
		if(strlen($post['user_password']) < 8){
			$errors['user_password'] = "Password Must be at Least 8 Characters Long";
		}

		if(empty($data['terms'])){
			$errors['terms'] = 'Please accept terms and conditions';
		}

		return $errors;
	}

	public function edit_validate($data,$id)
	{
		$errors = [];

		//Check first_name
		if(empty($data['first_name'])){
			$errors['first_name'] = "First name is required";
		}else
		if(!preg_match("/^[a-zA-Z]+$/",trim($data['first_name']))){
			$errors['first_name'] = "First name can only have Letters Without Spaces";
		}

		//Check last_name
		if(empty($data['last_name'])){
			$errors['last_name'] = "Last name is required";
		}else
		if(!preg_match("/^[a-zA-Z]+$/",trim($data['last_name']))){
			$errors['last_name'] = "Last name can only have Letters Without Spaces";
		}

		//Check phone 
		if(!empty($data['phone'])){

			// if(!preg_match("/^(07|\+250)[0-9]{8}$/",trim($data['phone']))){
			// 	$errors['phone'] = "Phone Number not valid";
			// }
		}

		//Check Email
		if(!filter_var($data['user_email'],FILTER_VALIDATE_EMAIL)){
			$errors['user_email'] = "Email is not Valid";
		}else
		if($results = $this->where(['user_email' => $data['user_email']])){
			foreach($results as $result){

				if($id !=$result->id)
				$errors['user_email'] = "That Email Already Existed";
			}
			
		}
		//Facebook Validation
		if(!empty($data['facebook_link'])){

			if(!filter_var($data['facebook_link'],FILTER_VALIDATE_URL)){
				$errors['facebook_link'] = "Facebook Link iss not Valid";
			}
		}

		//Linkedin Validation
		if(!empty($data['linkedin_link'])){

			if(!filter_var($data['linkedin_link'],FILTER_VALIDATE_URL)){
				$errors['linkedin_link'] = "Linkedin Link is not Valid";
			}
		}

		//Instagram Validation
		if(!empty($data['instagram_link'])){

			if(!filter_var($data['instagram_link'],FILTER_VALIDATE_URL)){
				$errors['instagram_link'] = "Instagram Link is not Valid";
			}
		}

		//Twitter Validation
		if(!empty($data['twitter_link'])){

			if(!filter_var($data['twitter_link'],FILTER_VALIDATE_URL)){
				$errors['twitter_link'] = "Twitter Link iss not Valid";
			}
		}

		return $errors;
	}

}