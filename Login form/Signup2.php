<?php 


session_start();
include_once '../Classes/User.php';
include_once '../Classes/RegisterContext.php';
include_once '../Classes/UserType.php';



$UserTypeObj = new UserType("../TextFiles/Usertype.txt","~");
$NewRegister = $UserTypeObj->getRegisterInfo($_SESSION['UserType']);

$ContextObject = new RegisterContext($NewRegister);
$ContextObject->RegisterUser();

session_unset();
session_destroy();





