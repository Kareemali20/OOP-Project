<?php 
session_start();
include_once '../Classes/User.php';

$Email = $_REQUEST['email'];
$Password = $_REQUEST['pass'];

$LoginUser = new User("../TextFiles/Users.txt","~");
$File = fopen($LoginUser->FileManager->getFileName(),"r+") or die ("File Not Found");

$isUser = false;

while(!feof($File)){
    $CurrentLine = fgets($File);
    $LineArray = explode($LoginUser->FileManager->getSeperator(),$CurrentLine);
    if($LineArray[2]==$Email && $LineArray[3] == $Password){
        $isUser = true;
    }
}

if($isUser){
    $_SESSION["Email"] = $Email;
    header("Location:../PhpPages/index.php");
}
else{
    header("Location:index.html");
}


