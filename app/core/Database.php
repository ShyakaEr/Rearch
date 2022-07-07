<?php

/*** Database class */

class Database
{

    private function connect(){

        $str  = DBDRIVER.":hostname=".DBHOST.";dbname=".DBNAME;
        $con  = new PDO($str, DBUSER,DBPASS);
        return $con;

    }

    public function query($query,$data=[],$type = 'object'){

        $con       = $this->connect();
        $stm       = $con->prepare($query);

        if($stm){
            $check = $stm->execute();

            if($check){

                //check the result type

                if($type == 'object'){

                    $type = PDO::FECTH_OBJ;
                    
                }else{
                    $type = PDO::FECTH_ASSOC;
                }

                $result = $stm->fetchAll($type);
                //return an array
                if(is_array($result) && count($result) > 0){
                    return $result;
                }
            }

        }
        return false;
        
    }

    /*Function to create tables*/

    public function create_tables(){

        //users table 
        $query  = "

        CREATE TABLE IF NOT EXISTS `users` (
            `id` int NOT NULL AUTO_INCREMENT,
            `user_email` varchar(60) DEFAULT NULL,
            `user_password` varchar(60) DEFAULT NULL,
            `create_at` date DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `user_email` (`user_email`),
            KEY `create_at` (`create_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

        ";
        $this->query($query);
    }
}
