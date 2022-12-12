<?php 

/**
 * Price Model
 */
class Price_model extends Model
{
	public    $errors         = [];
	protected $table          = "prices";
	protected $allowedColumns = [

		'tier',
		'price',
        'disabled',
	]; 
	
	public function validate($data)
	{
		$errors = [];

		//Check tier
		if(empty($data['tier'])){
			$errors['tier'] = "Name is required";
		}

		//Check price
		if(empty($data['price'])){
			$errors['price'] = "A Price is required";
		}
		return $errors;
	}

}