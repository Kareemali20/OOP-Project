<?php
include_once 'FileManager.php';
include_once 'Student.php';
include_once 'Teacher.php';

class UserType{
    private $ID;
    private $Name;
    private $UserType;
    public $FileManager;


    // Constructor
    public function __construct(string $FileName,string $Seperator){
        $this->FileManager = new FileManager($FileName,$Seperator);
    }


    // Setters and Getters
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

    // Functions
    public function GetUserWithHisType($Id){
        $File = fopen($this->FileManager->getFileName(),"r+") or die("File Not Found !");
        $IdUser = "";

        while(!feof($File)){
            $CurrentLine = fgets($File);
            
            $LineArray = explode($this->FileManager->getSeperator(),$CurrentLine);
            
            if($LineArray[0] == $Id){
                $IdUser = new UserType("../TextFiles/Usertype.txt","~");
                
                $IdUser->ID =$LineArray[0];
                $IdUser->Name = $LineArray[1];
                $IdUser->UserType = $LineArray[2];

                return $IdUser;
            }

        }
        fclose($File);

        return ;
    }

    public function GetUserTypeWithID($Id){
        $File = fopen($this->FileManager->getFileName(),"r+") or die("File Not Found !");
        $IdUser = "";

        while(!feof($File)){
            $CurrentLine = fgets($File);
            
            $LineArray = explode($this->FileManager->getSeperator(),$CurrentLine);
            
            if($LineArray[0] == $Id){
                $IdUser = new UserType("../TextFiles/Usertype.txt","~");
                
                $IdUser->ID =$LineArray[0];
                $IdUser->Name = $LineArray[1];
                $IdUser->UserType = $LineArray[2];

                return $IdUser->UserType;
            }

        }
        fclose($File);

        return ;
    }

    public function ListAllUsers(){
        $UsersArray = array();
        $File = fopen($this->FileManager->getFileName(),"r+") or die("File Not Found !");
        $i = 0;
        while(!feof($File)){

            $CurrentLine = fgets($File);
            $LineArray = explode($this->FileManager->getSeperator(),$CurrentLine);
            $UsersArray[$i] = new UserType("../TextFiles/Usertype.txt","~");
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

    public function getRegisterInfo($Type){
        if( $Type == 1){
            $S = new Student("../TextFiles/Student.txt","~");
            return $S;
        }
        else if($Type == 2){
            $T = new Teacher("../TextFiles/Teacher.txt","~");
            return $T;
        }
    }

}






