<?php

include_once '../Classes/User.php';

$UserObj = new User("../TextFiles/Users.txt","~");
$NewUser = TRUE;

$UserObj->setName($_REQUEST['Name']);
$UserObj->setId($UserObj->FileManager->getLastId()+1);
$UserObj->setEmail($_REQUEST['Email']);
$UserObj->setPassword($_REQUEST['Password']);
$UserObj->setAge($_REQUEST['Age']);

// Checking if the user is already signed up or not
$File = fopen($UserObj->FileManager->getFileName(),"r+") or die("File Not Found !");

    while(!feof($File)){
        $CurrentLine = fgets($File);
            
        $LineArray = explode($UserObj->FileManager->getSeperator(),$CurrentLine);
            
        if($LineArray[2] == $UserObj->getEmail()){
            $NewUser = FALSE;
        }

    }
fclose($File);

if($NewUser){
    $UserObj->StoreUser();
    header("location:index.html");
}
else{
    echo'<script> alert("This user is already signed up")</script>';
    header("location:Signup.html");
}
