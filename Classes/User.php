<?php

class User{
    private $ID;
    private $Name;
    private $Email;
    private $Password;
    private $Age;
    public $FileManager;

    public function __construct(string $FileName,string $Seperator){
        require 'FileManager.php';
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

    // Functions
    public function ListAllUsers(){
        $UsersArray = [];
        $index = 0;
        $File = fopen($this->FileManager->getFileName(),"r+") or die("File Not Found !");
        while(!feof($File)){
            $CurrentLine = fgets($File);
            $LineArray = explode($this->FileManager->getSeperator(),$CurrentLine);
            //$UsersArray[$i] = 
        }
    }

    public function GetUserById($Id){
        $IdUser;
        $File = fopen($this->FileManager->getFileName(),"r+") or die("File Not Found !");
        while(!feof($File)){
            $CurrentLine = fgets($File);
            $LineArray = explode($this->FileManager->getSeperator(),$CurrentLine);
            if($LineArray[0] == $Id){
                
            }
        }
    }

    public function StoreUser(){
        $Id = $this->FileManager->getLastId()+1;
        $User = $Id.$this->FileManager->getSeperator().$this->Name.$this->FileManager->getSeperator().
        $this->Email.$this->FileManager->getSeperator().
        $this->Password.$this->FileManager->getSeperator().$this->Age;
        $this->FileManager->StoreRecordInFile($User);
        echo $User;
    }

}

