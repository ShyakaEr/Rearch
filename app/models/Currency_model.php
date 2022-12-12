<?php 

/**
 * Currency Model
 */
class Currency_model extends Model
{
	public    $errors         = [];
	protected $table          = "currencies";
	protected $allowedColumns = [

		'currency',
		'symbol',
        'disabled',
	]; 
	
	public function validate($data)
	{
		$errors = [];

		//Check currency
		if(empty($data['currency'])){
			$errors['category'] = "A currency is required";
		}

		//Check symbol
		if(empty($data['symbol'])){
			$errors['symbol'] = "A currency Symbol is required";
		}
		
		return $errors;
	}

}