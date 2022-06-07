<?php
include_once 'FileManager.php';
include_once 'UserType.php';
class User{
    private $ID;
    private $Name;
    private $Email;
    private $Password;
    private $Age;
    private $UserType;
    public $FileManager;

    public function __construct(string $FileName,string $Seperator){
        $this->FileManager = new FileManager($FileName,$Seperator);
    }

    // Setters And Getters
    public function setID($ID)
    {
        $this->ID = $ID;

    }

    public function getID()
    {
        return $this->ID;
    }

    public function setName($Name)
    {
        $this->Name = $Name;

    }

    public function getName()
    {
        return $this->Name;
    }

    public function setAge($Age)
    {
        $this->Age = $Age;

    }

    public function getAge()
    {
        return $this->Age;
    }

    public function getPassword()
    {
        return $this->Password;
    }

  
    public function setPassword($Password)
    {
        $this->Password = $Password;

    }

    public function getEmail()
    {
        return $this->Email;
    }


    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getNumberOfAttributes(){
        return 5;
    }

    public function setUserType($UT){
        $this->UserType = $UT;
    }

    public function getUserType(){
        return $this->UserType;
    }

    
    // Functions
    public function GetUserById($Id){
        $IdUser = "";
        $File = fopen($this->FileManager->getFileName(),"r+") or die("File Not Found !");

        while(!feof($File)){
            $CurrentLine = fgets($File);
            
            $LineArray = explode($this->FileManager->getSeperator(),$CurrentLine);
            
            if($LineArray[0] == $Id){
                $F = new FileManager("../TextFiles/Users.txt","~");
                $Line = $F->GetLineWithId($Id);
        
                $IdUser = new User("../TextFiles/Users.txt","~");
                
                $IdUser->ID =$LineArray[0];
                $IdUser->Name = $LineArray[1];
                $IdUser->Email = $LineArray[2];
                $IdUser->Password = $LineArray[3];
                $IdUser->Age = $LineArray[4];
                $IdUser->UserType = $LineArray[5];

                return $IdUser;
            }

        }
        fclose($File);

        return 0;
    }

    public function ListAllUsers(){
        $UsersArray = array();
        $File = fopen($this->FileManager->getFileName(),"r+") or die("File Not Found !");
        $i = 0;
        while(!feof($File)){

            $CurrentLine = fgets($File);
            $LineArray = explode($this->FileManager->getSeperator(),$CurrentLine);
            $UsersArray[$i] = new User("../TextFiles/Users.txt","~");
            $UsersArray[$i] = $this->GetUserById($LineArray[0]);
            

            $i++;
        }
        fclose($File);
        return $UsersArray;
    }

    public function StoreUser(){
        
        // Added the user in the USERS File
        $User = ($this->FileManager->getLastId()+1).$this->FileManager->getSeperator().$this->Name.$this->FileManager->getSeperator().
        $this->Email.$this->FileManager->getSeperator().
        $this->Password.$this->FileManager->getSeperator().$this->Age.
        $this->FileManager->getSeperator().$this->UserType;
        $this->FileManager->StoreRecordInFile($User);

        // Added the user in the USERTYPE File
        $UserTypeObj = new UserType("../TextFiles/UserType.txt", "~");
        $UserTypeObj->setID($this->FileManager->getLastId()+1);
        $UserTypeObj->setName($this->Name);
        $UserTypeObj->setUserType($this->UserType);

        $Type = "";
        if($this->UserType == 1){
            $Type = "Student";
        }
        else if($this->UserType == 2){
            $Type = "Teacher";
        }
        else if($this->UserType == 3){
            $Type = "Admin";
        }
        

        $UserType = $this->ID.$UserTypeObj->FileManager->getSeperator().$this->Name.$UserTypeObj->FileManager->getSeperator().$Type;
        $UserTypeObj->FileManager->StoreRecordInFile($UserType);

    }

    public function DeleteUser($Id){
        // Deleting the user from the users file
        $UserLine = $this->FileManager->GetLineWithId($Id);
        $this->FileManager->DeleteRecordInFile($UserLine);

        // Deleting the user from the user type file
        $UserTypeObj = new UserType("../TextFiles/UserType.txt", "~");
        $UTLine = $UserTypeObj->FileManager->GetLineWithId($Id);
        $UserTypeObj->FileManager->DeleteRecordInFile($UTLine);

    }

    public function UpdateUser($OldRecord,$NewRecord){
        $this->FileManager->UpdateRecordInFile($NewRecord,$OldRecord);
    }

}


