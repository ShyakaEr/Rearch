<?php

/*Include The file if it does not find it*/

spl_autoload_register(function($class_name){
	
	require "../app/models/" .$class_name .".php";
});


//requiring all necessary files
require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';