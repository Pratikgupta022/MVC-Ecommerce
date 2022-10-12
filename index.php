<?php

session_start();

include_once("controller/Controller.php");
$action = isset($_GET['action']) ? $_GET['action'] : '';
$controller = new Controller();

if($action == 'register'){
    $controller->registerUser();
}
elseif ($action == 'login'){
    $controller->loginUser();
}
elseif ($action == 'admin'){
    if (isset($_GET['sort'])){
        $controller->adminPage($_GET['sort']);
    }
    else{
        $controller->adminPage(0);
    }
}
elseif ($action == 'registerEmployee'){
    $controller->registerEmployee();
}
elseif ($action == 'edituser') {
    if (isset($_GET['id'])){
        $_SESSION['editId'] = $_GET['id'];
        $controller->updateEmp($_GET['id']);
    }else{
        $controller->updateEmp($_SESSION['editId']);
    }
}
elseif ($action == 'deleteuser') {
    $controller->deleteUser($_GET['id']);
}
else {
//    if (isset($_SESSION['loggedInUser']['type'])){
//        header("Location: http://localhost/ClothingStore/index.php?action=404");
//    }else{
    $controller->loginPage();
//    }
}
