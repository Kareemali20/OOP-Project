<?php
include_once '../Classes/User.php';
$UserObj = new User("../TextFiles/Users.txt","~");
$UserObj->setName($_REQUEST['Name']);
$UserObj->setId($UserObj->FileManager->getLastId()+1);
$UserObj->setEmail($_REQUEST['Email']);
$UserObj->setPassword($_REQUEST['Password']);
$UserObj->setAge($_REQUEST['Age']);

$UserObj->StoreUser();

header("location:DashBoard.php");
?>