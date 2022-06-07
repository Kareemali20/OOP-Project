<?php 
include_once 'User.php';
include_once 'IRegester.php';


class Teacher extends User implements Register{
    public function RegisterAsUserType()
    {
        
        // Creating the Student
        $NewUser = TRUE;
        $Teacher = new User("../TextFiles/Users.txt", "~");

        $Teacher->setName($_REQUEST['Name']);
        $Teacher->setId($Teacher->FileManager->getLastId() + 1);
        $Teacher->setEmail($_REQUEST['Email']);
        $Teacher->setPassword($_REQUEST['Password']);
        $Teacher->setAge($_REQUEST['Age']);
        $Teacher->setUserType( $_SESSION['UserType']);

        
        // Checking if the user is already signed up or not
        $File = fopen($Teacher->FileManager->getFileName(), "r+") or die("File Not Found !");
        while (!feof($File)) {
            $CurrentLine = fgets($File);

            $LineArray = explode($Teacher->FileManager->getSeperator(), $CurrentLine);

            if ($LineArray[2] == $Teacher->getEmail()) {
                $NewUser = FALSE;
            }

        }
        fclose($File);
        if ($NewUser) {
            $Teacher->StoreUser();
            header("location:index.html");
        }
        else {
            header("location:Signup.php");
            echo '<script> alert("This user is already signed up")</script>';
        }
    }

    public function AddUserTypeAttribute(){
        return "Course Teaching";
    }
}