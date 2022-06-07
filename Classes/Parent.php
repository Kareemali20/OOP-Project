<?php 
include_once 'User.php';
include_once 'IRegester.php';


class Parent extends User implements Register{
    public function RegisterAsUserType()
    {
        
    }

    public function AddUserTypeAttribute(){
        return "Student ID";
    }
}