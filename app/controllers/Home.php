<?php

/*Limit Direct Access To My Controller */
if(!defined("ROOT")) die ("Direct Script Access Denied");

/**
 * home class
 */
class Home extends Controller
{
	
	public function index()
	{
		// $db = new Database();
		// $db->query();
		$data="Yolla";
		$this->view('home',$data);
	}

}