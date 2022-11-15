<?php

require "Config.php";

class Model extends Config {
    function __construct(){
        //
    }

    function registerUser($data){
        $name = $data['name'];
        $email = $data['email'];
        $password = md5($data['password']);
        $cpassword = md5($data['cpassword']);
        $sql = "SELECT * FROM users WHERE email='$email'";
//        echo $sql; die;
        $res = $this->dbconect()->query($sql);

        if (mysqli_num_rows($res)>0){
            return $res=false;
        }else{
            $insertQuery = "INSERT INTO users (name,email,password,confirm_pass,type) VALUES('$name','$email','$password','$cpassword','user')";
            return $res = $this->dbconect()->query($insertQuery);
        }
    }

    function loginCheck($data){
        $email = $data['email'];
        $password = md5($data['password']);
        $sql = "SELECT *  FROM users WHERE email='$email' AND password = '$password'";
        $res = $this->dbconect()->query($sql);
        $row = mysqli_fetch_assoc($res);
        $check = mysqli_num_rows($res);
        if ($check){
            return $row;
        }else{
            return $check=false;
        }
    }

    function registerEmployee($data){
//        return implode(",",$data['skills']); die;
        $fname=$data['fname'];
        $lname=$data['lname'];
        $dob=$data['dob'];
        $email=$data['email'];
        $phone=$data['phone'];
        $address=$data['address'];
        $image=$data['image'];
        $skills=implode(",",$data['skills']);
        $gender=$data['gender'];
        $pan=$data['pan'];
        $sql = "SELECT * FROM employee WHERE email='$email'";
        $sql1 = "SELECT * FROM employee WHERE pan='$pan'";
        $sql2 = "SELECT * FROM employee WHERE phone='$phone'";
        $res = $this->dbconect()->query($sql);
        $res1 = $this->dbconect()->query($sql1);
        $res2 = $this->dbconect()->query($sql2);
        if (mysqli_num_rows($res)>0){
            return $result1[]="email";
        }elseif (mysqli_num_rows($res1)>0){
            return $result1[]="pan";
        }elseif (mysqli_num_rows($res2)>0){
            return $result1[]="phone";
        }
        else {
            $sql = "INSERT INTO employee(fname,lname,dob,email,phone,address,photo,skills,gender,pan) VALUES('$fname','$lname','$dob','$email','$phone','$address','$image','$skills','$gender','$pan')";
//        return $sql; die;
            $result = $this->dbconect()->query($sql);
            if (!$result) {
                return false;
            } else {
                return 200;
            }
        }
    }

    function allUsersData($sort,$rowsNo){
        if ($sort=='1'){
            $sql = "SELECT * FROM employee ORDER BY created_at ASC limit 0,$rowsNo ";
        }
        elseif ($sort=='0'){
            $sql = "SELECT * FROM employee ORDER BY created_at DESC limit 0,$rowsNo ";
        }
        else{
            $sql = "SELECT * FROM employee ORDER BY $sort ASC  limit 0,$rowsNo";
        }
        $res = $this->dbconect()->query($sql);
        $data=array();
        if (mysqli_num_rows($res)>0){
            while ($row = mysqli_fetch_assoc($res)){
                $data[]= $row;
            }
        }
        return $data;
    }

    function deleteUser($id){
        $sql = "DELETE FROM employee WHERE id='$id'";
        $res = $this->dbconect()->query($sql);
        if ($res){
            header("location:http://localhost/Test/index.php?action=admin");
        }else{
            echo "error occurred"; die;
        }
    }

    function getDataById($id){
        $sql = "SELECT *  FROM employee WHERE id=$id";
        $res = $this->dbconect()->query($sql);
        $row = mysqli_fetch_assoc($res);
        return $row;
    }

    function updateEmp($data){
        $id = $data['id'];
        $fname = $data['fname'];
        $lname = $data['lname'];
        $email = $data['email'];
        $dob = $data['dob'];
        $gender = $data['gender'];
        $skills = implode(",",$data['skills']);
        $sql = "UPDATE employee SET fname = '$fname',lname = '$lname', email= '$email' ,gender = '$gender',skills = '$skills', dob = '$dob' WHERE id = '$id'";
//        return $sql; die;
        $res = $this->dbconect()->query($sql);
        if ($res){
            return true;
        }else{
            return false;
        }
    }

}

