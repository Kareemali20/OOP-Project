<?php
include_once "Empolyee.php";
include_once "FileMG.php";
class Admin extends Empolyee
{
    public function AddStudent(){
        $StudentID = GetLastId("Students.txt","~");
        $Record = $StudentID."~".$_POST["StudentEmail"]."~".$_POST["StudentPassword"]."~".
        $_POST["StudentName"]."~".$_POST["StudentAge"]."~".$_POST["StudentClass"]."~".$_POST["StudentSection"];
        StoreToFile("Students.txt",$Record);
    }
    public function ViewRegistered_Students()
    {
        echo "<h2>Regestered Students</h2>";
        DisplayTable("Students.txt","~");
    }
}
$x = new Admin();
$x->AddStudent();
?>