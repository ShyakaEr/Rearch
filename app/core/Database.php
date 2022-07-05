<?php

/*** Database class */

class Database
{

    private function connect(){

        $str  = DBDRIVER.":hostname=".DBHOST.";dbname=".DBNAME;
        $con  = new PDO($str, DBUSER,DBPASS);
        return $con;

    }

    public function query(){
        $con = $this->connect();
        
    }
}
