<?php 

/*Limit Direct Access To My Controller */
if(!defined("ROOT")) die ("Direct Script Access Denied");

/**
 * home class
 */
class Logout extends Controller
{
	
	public function index()
	{
		Auth::logout();
		redirect('login');
	}

}