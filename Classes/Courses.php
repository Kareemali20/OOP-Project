<?php

class Courses{
    private $Name;
    private $CreditHours;
    
    public function __construct($Name,$CreditHours){
        $this->Name = $Name;
        $this->CreditHours = $CreditHours;
    }

    public function getName()
    {
        return $this->Name;
    }

    
    public function setName($Name)
    {
        $this->Name = $Name;

    }

    public function getCreditHours()
    {
        return $this->CreditHours;
    }

    public function setCreditHours($CreditHours)
    {
        $this->CreditHours = $CreditHours;
    }
}