<?php 

/**
 * Category Model
 */
class Category_model extends Model
{
	public    $errors         = [];
	protected $table          = "categories";
	protected $allowedColumns = [

		'category',
		'disabled',
	]; 
	
	public function validate($data)
	{
		$errors = [];

		//Check category
		if(empty($data['category'])){
			$errors['category'] = "Category Name is required";
		}
		else
		if(!preg_match("/^[a-zA-Z \&\']+$/",trim($data['category']))){
			$errors['category'] = "Category name can only have Letters and Spaces";
		}

		return $errors;
	}

}