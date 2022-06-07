<?php

include_once 'User.php';
include_once 'IRegester.php';
class Student extends User implements Register
{
    public function RegisterAsUserType()
    {

        // Creating the Student
        $NewUser = TRUE;
        $Student = new User("../TextFiles/Users.txt", "~");

        $Student->setName($_REQUEST['Name']);
        $Student->setId($Student->FileManager->getLastId() + 1);
        $Student->setEmail($_REQUEST['Email']);
        $Student->setPassword($_REQUEST['Password']);
        $Student->setAge($_REQUEST['Age']);
        $Student->setUserType( $_SESSION['UserType']);

        
        // Checking if the user is already signed up or not
        $File = fopen($Student->FileManager->getFileName(), "r+") or die("File Not Found !");
        while (!feof($File)) {
            $CurrentLine = fgets($File);

            $LineArray = explode($Student->FileManager->getSeperator(), $CurrentLine);

            if ($LineArray[2] == $Student->getEmail()) {
                $NewUser = FALSE;
            }

        }
        fclose($File);
        if ($NewUser) {
            $Student->StoreUser();
            header("location:index.html");
        }
        else {
            header("location:Signup.php");
            echo '<script> alert("This user is already signed up")</script>';
        }
    }


    public function AddUserTypeAttribute(){
        return "Enter your grade";
    }

}