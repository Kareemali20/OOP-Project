<?php

class FileManager{
    private $FileName;
    private $Seperator;

    public function __construct(string $FileName,string $Seperator){
        $this->FileName = $FileName;
        $this->Seperator = $Seperator;
    }
    
    public function getFileName()
    {
        return $this->FileName;
    }

  
    public function setFileName($FileName)
    {
        $this->FileName = $FileName;
    }

   
    public function getSeperator()
    {
        return $this->Seperator;
    }

    public function setSeperator($Seperator)
    {
        $this->Seperator = $Seperator;
    }

    public function getFile(){
        echo "The file name : ".$this->getFileName()." the seperator of the file : ".$this->getSeperator();
    }



    // Functions    
    public function getLastId(){
        $File = fopen($this->FileName,"r+") or die ("File Not Found");
        
        //Checking if the file exists or not
        if(!file_exists($this->getFileName())){
            echo "File Not Found ";
            return 0;
        }

        $LastId = 0;

        while(!feof($File)){

            $CurrentLine = fgets($File);   // Reading the current line
            $LineArray = explode($this->Seperator,$CurrentLine );   // Sperating the line into an array with indexes

            if($LineArray[0]!=""){
                $LastId = $LineArray[0];
            }    
        }
        fclose($File);
        return $LastId;
    }


    // Not Going to use this function
    public function DrawTableFromFile(){
        $File = fopen($this->FileName,"r+") or die ("File Not Found");
        
        echo "<table>";
        while(!feof($File)){

            $CurrentLine = fgets($File);
            echo "<tr>";
            $LineArray = explode($this->Seperator,$CurrentLine);
            
            for($i=0;$i<count($LineArray);$i++){
                echo "<td>".$LineArray[$i]." </td>";
                
            }
            
            echo "</tr>";
        }
        echo "</table>";

        fclose($File);
    }

    public function StoreRecordInFile($Record){
        $File = fopen($this->getFileName(),"a+");
        fwrite($File,"\r\n".$Record);
        fclose($File);
    }

    public function DeleteRecordInFile($Record){
        $FileIntoString = file_get_contents($this->FileName);
        $FileIntoString = str_replace($Record,"",$FileIntoString);
        file_put_contents($this->FileName,$FileIntoString);
    }

    public function UpdateRecordInFile($NewRecord,$OldRecord){
        $FileIntoString = file_get_contents($this->FileName);
        $FileIntoString = str_replace($OldRecord,$NewRecord,$FileIntoString);
        file_put_contents($this->FileName,$FileIntoString);
    }

    public function GetLineWithId($Id){
        $File = fopen($this->FileName,"r+") or die ("File Not Found");
        

        while(!feof($File)){

            $CurrentLine = fgets($File);
            $LineArray = explode($this->Seperator,$CurrentLine);
            if($LineArray[0]==$Id){
                return $CurrentLine;
            }
              
        }

        fclose($File);
        return 0;
    }


}


