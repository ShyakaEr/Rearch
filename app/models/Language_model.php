<?php 

/**
 * Language Model
 */
class Language_model extends Model
{
	public    $errors         = [];
	protected $table          = "languages";
	protected $allowedColumns = [

		'lang',
		'symbol',
        'disabled',
	]; 
	
	public function validate($data)
	{
		$errors = [];

		//Check lang
		if(empty($data['lang'])){
			$errors['lang'] = "A Language is required";
		}

		//Check symbol
		if(empty($data['symbol'])){
			$errors['symbol'] = "A Language Code is required";
		}
		return $errors;
	}

}