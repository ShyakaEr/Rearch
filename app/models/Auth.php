<?php

/*Limit Direct Access To My Controller */
if(!defined("ROOT")) die ("Direct Script Access Denied");

/**
 * Authentication Class
 */
class Auth 
{
	public static function  authenticate($row){

		//Store User Data Through Session
		if(is_object($row)){

			$_SESSION['USER_DATA'] = $row;
		}
	}

	public static function logged_in(){

		if(!empty($_SESSION['USER_DATA'])){

			return true;
		}

		return false;
	}

	public static function is_admin(){

		if(!empty($_SESSION['USER_DATA'])){

			//Check role Type

			if($_SESSION['USER_DATA']->role =='admin'){

				return true;
			}
		}
		return false;
	}

	public static function  logout(){

		if(!empty($_SESSION['USER_DATA'])){
			unset($_SESSION['USER_DATA']);

		}
	}

	public static function __callStatic($funcname,$args){

		$key =  str_replace("get", "", strtolower($funcname));

		if(!empty($_SESSION['USER_DATA']->$key)){

			return $_SESSION['USER_DATA']->$key;
		}
		return '';
	}
}