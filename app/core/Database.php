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
            $check = $stm->execute($data);

            if($check){

                //check the result type

                if($type == 'object'){

                    $type = PDO::FETCH_OBJ;
                    
                }else{
                    $type = PDO::FETCH_ASSOC;
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
                `first_name` varchar(30) DEFAULT NULL,
                `last_name` varchar(30) DEFAULT NULL,
                `user_email` varchar(60) DEFAULT NULL,
                `role` varchar(30) DEFAULT NULL,
                `user_password` varchar(60) DEFAULT NULL,
                `create_at` date DEFAULT NULL,
                PRIMARY KEY (`id`),
                KEY `user_email` (`user_email`),
                KEY `create_at` (`create_at`),
                KEY `first_name` (`first_name`),
                KEY `last_name` (`last_name`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
        ";
        
        $this->query($query);

        //courses table 
        $query  = "

        CREATE TABLE `courses` (
            `id` int NOT NULL AUTO_INCREMENT,
            `descriptions` text,
            `user_id` int DEFAULT NULL,
            `category_id` int DEFAULT NULL,
            `sub_category_id` int DEFAULT NULL,
            `level_id` int DEFAULT NULL,
            `language_id` int DEFAULT NULL,
            `price_id` int DEFAULT NULL,
            `promo_link` varchar(1024) DEFAULT NULL,
            `welcome_message` varchar(1024) DEFAULT NULL,
            `congratulations_message` varchar(2048) DEFAULT NULL,
            `primary_subject` varchar(255) DEFAULT NULL,
            `course_promo_video` varchar(1024) DEFAULT NULL,
            `course_image` varchar(1024) DEFAULT NULL,
            `create_at` datetime DEFAULT NULL,
            `tags` varchar(2048) DEFAULT NULL,
            `title` varchar(100) DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `title` (`title`),
            KEY `user_id` (`user_id`),
            KEY `category_id` (`category_id`),
            KEY `sub_category_id` (`sub_category_id`),
            KEY `level_id` (`level_id`),
            KEY `language_id` (`language_id`),
            KEY `price_id` (`price_id`),
            KEY `primary_subject` (`primary_subject`),
            KEY `create_at` (`create_at`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
        ";
        
        $this->query($query);

        //categories table 
        $query  = "

        CREATE TABLE `categories` (
            `id` int NOT NULL AUTO_INCREMENT,
            `category` varchar(50) DEFAULT NULL,
            `disabled` tinyint(1) DEFAULT '0',
            PRIMARY KEY (`id`),
            KEY `category` (`category`),
            KEY `disabled` (`disabled`)
           ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
        ";
        
        $this->query($query);
    }
}
