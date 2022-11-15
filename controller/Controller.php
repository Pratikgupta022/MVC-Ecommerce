<?php
include "model/Model.php";

class Controller
{
    public $model;

    function __construct(){
        $this->model = new Model();
    }

    function loginPage(){
        include "view/login.php";
    }

    static function errorpage(){
        include "view/404.php";
    }

    function registerUser()
    {
        try {
            if (isset($_POST['name'])) {
//                print_r($_POST); die;
                $errors = [];
                $name = trim($_POST['name']);
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
                $cPassword = trim($_POST['cpassword']);

                $formElements = ['name' => $name, 'email' => $email, 'password' => $password, 'cpassword' => $cPassword];
                foreach ($formElements as $key => $value) {
                    if (empty($value)) {
                        $errors[$key] = $key . " is required";
                    }
                }
                if ($password != $cPassword) {
                    $errors["mpass"] = " Passwords do not match";
                }
                if (empty($errors)) {
                    $res = $this->model->registerUser($formElements);
                    if ($res) {
                        echo json_encode(array("statusCode" => 200));
                    } else {
                        echo json_encode(array("emailExists" => "Please use different email"));
                        die;
                    }
                } else {
                    $errors['msg'] = "Sorry! something went wrong.";
                    echo json_encode($errors);
                    die;
                }
            } else {
                include "view/register.php";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function loginUser()
    {
        try {
//                print_r($_POST); die;
            if (isset($_POST['email'])) {
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
                $formElements = ['email' => $email, 'password' => $password];
                foreach ($formElements as $key => $value) {
                    if (empty($value)) {
                        $errors[$key] = $key . " is required";
                    }
                }
                if (empty($errors)) {
                    $res = $this->model->loginCheck($formElements);
                    if ($res) {
                        $_SESSION['loggedInUser'] = $res;
                        echo json_encode($res);
                        die;
                    } else {
                        echo json_encode(array("error" => "Wrong credentials"));
                        die;
                    }
                } else {
                    echo json_encode($errors);
                }
            } else {
                self::loginPage();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function adminPage($data)
    {
        $detailsPerPage= $data['detailsPerPage'];
        $sort= $data['sort'];
        $data = $this->model->allUsersData($sort,$detailsPerPage);
        if (self::isAjax()){
                $count = 1;
                foreach ($data as $row){
                    $data[$count]="<tr>
                        <th scope='row'><?php echo $count; ?></th>
                        <td style='text-transform: capitalize'>". $row['fname']." ".$row['lname']." ?></td>
                        <td>". $row['dob'] ."</td>
                        <td>".$row['gender'] ."</td>
                        <td>".$row['email'] ."</td>
                        <td><?php echo $row['skills'] ?></td>
                        <td><img src='view/images/<?php echo $row['photo'] ?>' height='40px' width='50px' alt='sort icon'></td>
                        <td><a href='http://localhost/Test/index.php?action=edituser&id=<?php echo $row['id'] ?>' class='btn btn-sm btn-primary'>Edit</a></td>
<!--                        <td><a href='http://localhost/Test/index.php?action=deleteuser&id=--><?php //echo $row['id'] ?><!--' class='btn btn-sm btn-danger'>Delete</a></td>-->
                        <td>
                            <form action='http://localhost/Test/index.php?action=deleteEmp' method='post'>
                                <input type='hidden' name='delId' value='<?php echo $row['id'] ?>'>
                                <input type='hidden' name='delImg' value='<?php echo $row['photo'] ?>'>
                                <input type='submit' value='Delete' class='btn btn-sm btn-danger'>
                            </form>
                        </td>
                    </tr>";
                    $count++;
                }
            echo json_encode($data);
            die;
        }
        include "view/admin/index.php";
    }

    function indexPage(){
        include "view/index.php";
    }

    function deleteUser()
    {
        unlink("view/images/".$_POST['delImg']);
        $this->model->deleteUser($_POST['delId']);
    }

    function registerEmployee()
    {
        try {
            if (isset($_POST['email'])) {
//                $errors[]="";
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $dob = $_POST['dob'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $skills = $_POST['skills'];
                $gender = $_POST['gender'];
                $pan = $_POST['pan'];
                $imgName = $_FILES['image']['name'];
                $imgSize = $_FILES['image']['size'];
                $tmpName = $_FILES['image']['tmp_name'];
                $error = $_FILES['image']['error'];
                if ($error === 0) {
                    if ($imgSize > 1000000) {
                        $em = "your file is too large";
                        $error = array('error' => 1, 'em' => $em);
                        echo json_encode($error);
                    } else {
                        $imgExt = pathinfo($imgName, PATHINFO_EXTENSION);
                        $imgExtlow = strtolower($imgExt);
                        $allowedExt = ["jpg", "jpeg", "png"];
                        if (in_array($imgExtlow, $allowedExt)) {
                            $onlyImageName = basename($imgName, "." . $imgExtlow);
                            $newImgName = $onlyImageName . "(" . time() . ")" . "." . $imgExt;
                            $upload_path = "view/images/" . $newImgName;
                            move_uploaded_file($tmpName, $upload_path);
                        } else {
                            $em = "you can't upload files of this type ";
                            $error = array('error' => 1, 'em' => $em);
                            echo json_encode($error);
                        }
                    }
                } else {
                    $em = "unknown error occurred";
                    $error = array('error' => 1, 'em' => $em);
                    echo json_encode($error);
                }
                $formElements = ["fname" => $fname, "lname" => $lname, "dob" => $dob, "email" => $email, "phone" => $phone, "address" => $address, "gender" => $gender, "pan" => $pan, "image" => $newImgName, "skills" => $skills];

                foreach ($formElements as $key => $value) {
                    if (empty($value)) {
                        $errors[$key] = $key . " is required";
                    }
                }
                if (empty($errors)) {
                    $data = $this->model->registerEmployee($formElements);
//                    echo json_encode($data); die;
                    if ($data == 200) {
                        echo json_encode(array("statusCode" => 200));
                    }else {
                        echo json_encode(array("statusCode" => $data));
                    }
                } else {
                    $errors['msg'] = "Sorry! You have errrors";
                    echo json_encode($errors);
                }

            } else {
                include "view/admin/registerEmployee.php";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function updateEmp($editid)
    {

        if (isset($_POST['fname'])) {
            print_r($_POST); die;
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $skills = $_POST['skills'];
            $gender = $_POST['gender'];
            $formElements = ["id"=>$editid,"fname" => $fname, "lname" => $lname, "dob" => $dob, "email" => $email, "gender" => $gender, "skills" => $skills];
            foreach ($formElements as $key => $value) {
                if (empty($value)) {
                    $errors[$key] = $key . " is required";
                }
            }
            if (empty($errors)) {
                $data = $this->model->updateEmp($formElements);
//                    echo json_encode($data); die;
                if ($data){
                    echo json_encode(array("statusCode" => 200));
                }
            } else {
//                echo json_encode(array("statusCode" => 400)); die;
                $errors['msg'] = "Sorry! You have errrors";
                echo json_encode($errors);
            }
        } else {
            $data = $this->model->getDataById($editid);
            include "view/admin/updateEmp.php";
        }
    }

    // ** Util functions **
    public static function isAjax() {
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
        return false;
    }

}