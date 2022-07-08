<?php

/*
app info 
*/

define('APP_NAME', 'Rearch Academy');
define('APP_DESC', 'E-learning Tutorial');

/*
Database config 
*/

/*Check if we are on local server or live server*/

if($_SERVER['SERVER_NAME']=='localhost'){

	//database config for your localhost server
	define('DBHOST', 'localhost');
	define('DBNAME', 'reach_db');
	define('DBUSER', 'root');
	define('DBPASS', 'Kashya@12345');
	define('DBDRIVER', 'mysql');

	//Root Path eg: localhost
	define('ROOT', 'http://localhost/Rearch/public');

}else{

	//database config for your liver server
	define('DBHOST', 'localhost');
	define('DBNAME', 'reach_db');
	define('DBUSER', 'root');
	define('DBPASS', 'Kashya@12345');
	define('DBDRIVER', 'mysql');

	//Root Path eg: www.yourwebsite.com
	define('ROOT', 'http://www.yourwebsite.com');
}

