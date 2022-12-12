<?php 

/**
 * CourseLevel_model
 */
class CourseLevel_model extends Model
{
	public    $errors         = [];
	protected $table          = "course_levels";
	protected $allowedColumns = [

		'level',
		'disabled',
	]; 
	
	public function validate($data)
	{
		$errors = [];

		//Check level
		if(empty($data['level'])){
			$errors['level'] = " A Level is required";
		}

		return $errors;
	}

}