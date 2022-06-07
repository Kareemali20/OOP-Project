<?php

include_once '../Classes/User.php';


foreach($_REQUEST["Select"] as $Index){
    $UserObj = new User("../TextFiles/Users.txt","~");
    $UserObj->DeleteUser($Index);
}

header("location:index.php");
