<?php

require "Config.php";

class CreateTable extends Config{

    function create_users_table(){
        try {
            $sql = "CREATE TABLE users(`id` bigint AUTO_INCREMENT PRIMARY KEY,
                `name` varchar(200) NOT NULL,`email` varchar(200) UNIQUE NOT NULL,
                 `password` varchar(200) NOT NULL, `confirm_pass` varchar(200) NOT NULL,
                 `type` varchar(100) NOT NULL, `created_at` TIMESTAMP , `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP )";

            $result= mysqli_query($this->dbconect(),$sql);
            if (!$result){
                echo "Table already exists";
            }
//        else{
//            echo "Table Created successfully <br>";
//        }
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    function create_employee_table(){
        try {
            $sql = "CREATE TABLE employee(`id` bigint AUTO_INCREMENT PRIMARY KEY,
                `fname` varchar(100) NOT NULL,`lname` varchar(100) NOT NULL,`dob` varchar(100) NOT NULL,
                `email` varchar(200) UNIQUE NOT NULL,`phone` varchar(100) UNIQUE NOT NULL,
                 `address` varchar(700) NOT NULL,`photo` varchar(100) NOT NULL,
                 `skills` varchar(100) NOT NULL,`gender` varchar(100) NOT NULL,`pan` varchar(100) UNIQUE NOT NULL,
                  `created_at` TIMESTAMP , `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP )";
//            echo $sql; die;
            $result= mysqli_query($this->dbconect(),$sql);
            if (!$result){
                echo "<br>Error creating table: ";
            }
//            else{
//                echo "table created";
//            }
        }catch (Exception $e){
            echo $e->getMessage();
        }

    }
}

$a = new CreateTable();
$a->create_employee_table();

