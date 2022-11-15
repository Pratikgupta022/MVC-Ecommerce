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
elseif ($action == 'index'){
    $controller->indexPage();
}
elseif ($action == 'admin'){
    $data['sort'] = isset($_GET['sort']) ? $_GET['sort'] : 0;
    $data['detailsPerPage'] = isset($_GET['detailsPerPage']) ? $_GET['detailsPerPage'] : 5;
    $controller->adminPage($data);
//    $controller->adminPage($_GET['sort'] ?? 0,$_GET['rowsNo'] ?? 5);
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
elseif ($action == 'deleteEmp') {
    $controller->deleteUser();
}
else {
    $controller->loginPage();
}
