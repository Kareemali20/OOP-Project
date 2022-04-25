<?php
    function StoreToFile($myFile,$Record)
    {
        $Xfile = fopen($myFile, "a+") or die("Unable to open file");
        fwrite($Xfile, $Record."\r\n");
        fclose($Xfile);
    }
    function DisplayTable($myFile,$Seperator)
    {
        ?>
        <table border = 1>
        <?php
        $Xfile = fopen($myFile, "r+") or die("Unable to open file");
        while(1)
        {
            $line = fgets($Xfile);
            $CutLine = explode($Seperator, $line);
            if(feof($Xfile))
                break;
            echo "<tr>";
            for($i=0;$i<count($CutLine);$i++)
            {
                echo "<td>".$CutLine[$i]."</td>";
            }
            echo "</tr>";
        }
        
        ?>
        </table>
        <?php
    }
    function GetLastId($myFile,$Seperator)
    {
        if(!file_exists($myFile))
        {
            return 0;
        }
        $XFile = fopen($myFile,"r+") or die("Unable to open file");
        $LastID =0;
        while(!feof($XFile))
        {
            $line = fgets($XFile);
            $exploader = explode($Seperator,$line);
            if($exploader[0] != "")
            {
                $LastID = $exploader[0];
            }
        }
        return $LastID+1;
    }
?>