<?php
include_once '../Classes/User.php';
$UserObj = new User("../TextFiles/Users.txt","~");
$UserObj->DeleteUser($_GET["Id"]);


header("location:index.php");
?>