<?php
require 'FileManager.php';

class UserType{
    private $ID;
    private $Name;
    private $UserType;
    public $FileManager;

    public function __construct(string $FileName,string $Seperator){
        $this->FileManager = new FileManager($FileName,$Seperator);
    }

    public function getID()
    {
        return $this->ID;
    } 

    public function setID($ID)
    {
        $this->ID = $ID;
    }

    public function getName()
    {
        return $this->Name;
    }

  
    public function setName($Name)
    {
        $this->Name = $Name;

    }

    public function getUserType()
    {
        return $this->UserType;
    }


    public function setUserType($UserType)
    {
        $this->UserType = $UserType;
    }


    public function getNumberOfAttributes(){
        return 3;
    }





    public function GetUserWithHisType($Id){
        $IdUser;
        $File = fopen($this->FileManager->getFileName(),"r+") or die("File Not Found !");

        while(!feof($File)){
            $CurrentLine = fgets($File);
            
            $LineArray = explode($this->FileManager->getSeperator(),$CurrentLine);
            
            if($LineArray[0] == $Id){
                $F = new FileManager("../TextFiles/Usertype.txt","~");
                $Line = $F->GetLineWithId($Id);
        
                $IdUser = new User("../TextFiles/Usertype.txt","~");
                
                $IdUser->ID =$LineArray[0];
                $IdUser->Name = $LineArray[1];
                $IdUser->UserType = $LineArray[2];

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
            $UsersArray[$i] = new User("../TextFiles/Usertype.txt","~");
            $UsersArray[$i] = $this->GetUserWithHisType($LineArray[0]);
            

            $i++;
        }
        fclose($File);
        return $UsersArray;
    }

    public function StoreUser(){
        $Id = $this->FileManager->getLastId()+1;
        $User = $Id.$this->FileManager->getSeperator().$this->Name.$this->FileManager->getSeperator().
        $this->UserType;
        $this->FileManager->StoreRecordInFile($User);
        echo $User;
    }

    public function DeleteUser($Id){
        $UserLine = $this->FileManager->GetLineWithId($Id);
        $this->FileManager->DeleteRecordInFile($UserLine);
    }



}
$UserType = new UserType("../TextFiles/Usertype.txt","~");
$UserType->FileManager->DrawTableFromFile();

?>