<?php

/*Limit Direct Access To My Controller */
if(!defined("ROOT")) die ("Direct Script Access Denied");

/**
 * Ajax class
 */
class Ajax extends Controller
{
	
	public function index()
	{


		//$this->view('ajax',$data);
	}

    public function course_edit($user_id = null,$id=null)
	{
        $data['title']  = "Ajax";
        
        //Define Model
		$category       = new Category_model();
		$course         = new Course_model();
		$language       = new Language_model();
		$course_level   = new CourseLevel_model();
		$price          = new Price_model();
		$currency       = new Currency_model();

        //read data from different Models 
		
        $data['categories']    = $category->findAll('asc');
        $data['languages']     = $language->findAll('asc');
        $data['course_levels'] = $course_level->findAll('asc');
        $data['prices']        = $price->findAll('asc');
        $data['currencies']    = $currency->findAll('asc');

        //get course information 
	    $data['row'] = $row = $course->first(['user_id'=>$user_id,'id'=>$id]);

		$this->view('course-edit-tabs/course-landing-page',$data);
	}

}