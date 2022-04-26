<?php
include_once "User.php";
include 'Courses.php';
class Student extends User {
    private $Level;
    private $Section;
    private $GPA;
    private $Courses;

    public function __construct(){
        $Courses = [];
    }

 
    public function setLevel($Level)
    {
        $this->Level = $Level;
    }

    public function getLevel()
    {
        return $this->Level;
    }


    public function setSection($Section)
    {
        $this->Section = $Section;
    }

    public function getSection()
    {
        return $this->Section;
    }
 
    public function setGPA($GPA)
    {
        $this->GPA = $GPA;

    }

    public function getGPA()
    {
        return $this->GPA;
    }

    public function getNumberOfAttributes(){
        return 9;
    }

    public function AddCourse($Name,$Hours){
        $Course = new Courses($Name,$Hours);
        // for($i=0;$i<$count($Courses);$i++){
        //     echo $Courses[$i]->getName." ".$Courses[$i]->getCreditHours;
        // }
    }
    

    //Functions
    public function ListAllStudents(){

    }
    

}
?>