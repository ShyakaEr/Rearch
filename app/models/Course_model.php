<?php 

/**
 * Course Model
 */
class Course_model extends Model
{
	public    $errors         = [];
	protected $table          = "courses";

	//Run This Functions within afterSelect Array
	protected $afterSelect    = [
		'get_user',
		'get_category',
		'get_sub_category',
		'get_price',
		'get_level',
		'get_language',
	];
	//Run This Function within BeforeUpdate Array
	protected $beforeUpdate   = [];
	protected $allowedColumns = [

		'descriptions',
		'user_id',
		'category_id',
		'sub_category_id',
		'level_id',
		'language_id',
		'price_id',
		'promo_link',
		'welcome_message',
		'congratulations_message',
		'primary_subject',
		'course_promo_video',
		'course_image',
		'create_at',
		'tags',
		'title',
		'approved',
		'published',
	]; 
	
	public function validate($data)
	{
		$errors = [];

		//Check title
		if(empty($data['title'])){
			$errors['title'] = "Course Title is required";
		}
		else
		if(!preg_match("/^[a-zA-Z \-\_\&]+$/",trim($data['title']))){
			$errors['title'] = "Course Title can only have Letters Spaces and Special Symbols";
		}

		//Check primary_subject
		if(empty($data['primary_subject'])){
			$errors['primary_subject'] = "A primary Subject is required";
		}
		else
		if(!preg_match("/^[a-zA-Z \-\_\&]+$/",trim($data['primary_subject']))){
			$errors['primary_subject'] = "A primary Subject can only have Letters";
		}

		//Check category_id
		if(empty($data['category_id'])){
			$errors['category_id'] = "Category is required";
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

	protected function get_user($rows){
		
		//Create New Database Instance
		$db  = new Database();

		if(!empty($rows[0]->user_id)){

			foreach ($rows as $key => $row) {

				$query     = "SELECT first_name,last_name,role FROM users WHERE id = :id LIMIT 1";
				$user_row  = $db->query($query,['id'=>$row->user_id]);

				if(!empty($user_row)){
					
					$user_row[0]->names = $user_row[0]->first_name . '  ' .$user_row[0]->last_name;

					//Add it to rows object
					$rows[$key]->user_id_row = $user_row[0]; 
				}
			}
		}

		return $rows;
	}

	protected function get_category($rows){

		//Create New Database Instance
		$db  = new Database();

		if(!empty($rows[0]->category_id)){

			foreach ($rows as $key => $row) {

				$query = "SELECT * FROM categories WHERE id = :id LIMIT 1";
				$categ = $db->query($query,['id'=>$row->category_id]);

				if(!empty($categ)){
					
					//Add it to rows
					$rows[$key]->category_id_row = $categ[0]; 
				}
			}
		}
		return $rows;
	}

	protected function get_sub_category($rows){

		//Create New Database Instance
		$db  = new Database();

		if(!empty($rows[0]->sub_category_id)){

			foreach ($rows as $key => $row) {

				$query   = "SELECT * FROM sub_categories WHERE id = :id LIMIT 1";
				$sub_cat = $db->query($query,['id'=>$row->sub_category_id]);

				if(!empty($sub_cat)){
					
					//Add it to rows
					$rows[$key]->sub_category_id_row = $sub_cat[0]; 
				}
			}
		}
		return $rows;
	}

	protected function get_price($rows){

		//Create New Database Instance
		$db  = new Database();

		if(!empty($rows[0]->price_id)){

			foreach ($rows as $key => $row) {

				$query     = "SELECT * FROM prices WHERE id = :id LIMIT 1";
				$price_row = $db->query($query,['id'=>$row->price_id]);

				if(!empty($price_row)){
					
					$price_row[0]->tier = $price_row[0]->tier . ' ($' .$price_row[0]->price .')' ;

					//Add it to rows
					$rows[$key]->price_id_row = $price_row[0]; 
				}
			}
		}
		return $rows;
	}

	protected function get_level($rows){

		//Create New Database Instance
		$db  = new Database();

		if(!empty($rows[0]->level_id)){

			foreach ($rows as $key => $row) {

				$query     = "SELECT * FROM levels WHERE id = :id LIMIT 1";
				$level_row = $db->query($query,['id'=>$row->level_id]);

				if(!empty($price_row)){
					
					//Add it to rows
					$rows[$key]->level_id_row = $level_row[0]; 
				}
			}
		}
		return $rows;
	}

	protected function get_language($rows){
		
		//Create New Database Instance
		$db  = new Database();

		if(!empty($rows[0]->language_id)){

			foreach ($rows as $key => $row) {

				$query     = "SELECT * FROM languages WHERE id = :id LIMIT 1";
				$lang_row  = $db->query($query,['id'=>$row->language_id]);

				if(!empty($price_row)){
					
					//Add it to rows
					$rows[$key]->language_id_row = $lang_row[0]; 
				}
			}
		}

		return $rows;
	}

}