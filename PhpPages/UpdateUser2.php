<?php

include_once '../Classes/User.php';
session_start();
$_SESSION['Name'] = $_POST['Name'];
$_SESSION['Email'] = $_POST['Email'];
$_SESSION['Password'] = $_POST['Password'];
$_SESSION['Age'] = $_POST['Age'];

$UserObj = new User("../TextFiles/Users.txt","~");


$OldRecord = $UserObj->FileManager->GetLineWithId($_SESSION['Id']);
$UserObj = $UserObj->GetUserById($_SESSION['Id']);

$NewRecord = $_SESSION['Id']."~".$_SESSION['Name']."~".$_SESSION['Email']."~".$_SESSION['Password']."~".$_SESSION['Age']."~".$UserObj->getUserType();

$UserObj->UpdateUser($OldRecord,$NewRecord);

session_destroy();
header("location:index.php");
?>