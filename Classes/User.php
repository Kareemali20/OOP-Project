<?php
require 'FileManager.php';

class User{
    private $ID;
    private $Name;
    private $Email;
    private $Password;
    private $Age;
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

    
    // Functions
    public function GetUserById($Id){
        $IdUser;
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
        $Id = $this->FileManager->getLastId()+1;
        $User = $Id.$this->FileManager->getSeperator().$this->Name.$this->FileManager->getSeperator().
        $this->Email.$this->FileManager->getSeperator().
        $this->Password.$this->FileManager->getSeperator().$this->Age;
        $this->FileManager->StoreRecordInFile($User);
        echo $User;
    }

    public function DeleteUser($Id){
        $UserLine = $this->FileManager->GetLineWithId($Id);
        $this->FileManager->DeleteRecordInFile($UserLine);
    }

    public function UpdateUser($OldRecord,$NewRecord){
        $this->FileManager->UpdateRecordInFile($NewRecord,$OldRecord);
    }

}



