<?php

class Config{
    private $serverName;
    private $username;
    private $password;
    private $database;

    function dbconect(){
        $this->serverName= "localhost";
        $this->username = "root";
        $this->password = "";
        $this->database = "task";

        $conn=mysqli_connect($this->serverName,$this->username,$this->password,$this->database);
        if (!$conn){
            echo "Database connection error";
        }
//        else{
//            echo "Database connected <br>";
//        }
//        $sql = "CREATE TABLE users(`id` bigint AUTO_INCREMENT PRIMARY KEY,
//                `name` varchar(200) NOT NULL,`email` varchar(200) UNIQUE NOT NULL,
//                 `password` varchar(200) NOT NULL, `confirm_pass` varchar(200) NOT NULL,
//                 `type` varchar(100) NOT NULL, `created_at` TIMESTAMP , `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP )";
//
//        $result= mysqli_query($conn,$sql);
////        if (!$result){
////            echo "Table already exists";
////        }
////        else{
////            echo "Table Created successfully <br>";
////        }
        return $conn;
    }

}
