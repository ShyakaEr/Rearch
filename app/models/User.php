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
	]; 
	
	public function validate($data)
	{
		$this->errors = [];

		//Check first_name
		if(empty($data['first_name'])){
			$this->errors['first_name'] = "First name is required";
		}
		// else
		// if(!preg_match('/[a-zA-Z]/',$data['first_name'])){
		// 	$this->$errors['first_name']  = "Only Letters Allowed in First name";
		// }

		//Check last_name
		if(empty($data['last_name'])){
			$this->errors['last_name'] = "Last name is required";
		}
		// else
		// if(!preg_match('/[a-zA-Z]/',$data['last_name'])){
		// 	$this->errors['last_name']  = "Only Letters Allowed in Last name";
		// }

		//Check Email

		if(!filter_var($data['user_email'],FILTER_VALIDATE_EMAIL)){
			$this->errors['user_email'] = "Email is not Valid";
		}else
		if($this->whereClause(['user_email' => $data['user_email']])){
			$this->errors['user_email'] = "That Email Already Existed";
		}

		if(empty($data['user_password'])){

			$this->errors['user_password'] = 'A Password is required';
		}

		if($data['user_password'] !== $data['confirm_password']){

			$this->errors['user_password'] = 'Password do not match';
		}

		if(empty($data['terms'])){

			$this->errors['terms'] = 'Please accept terms and conditions';
		}

		if(empty($errors)){
			return true;
		}

		return false;
	}

}