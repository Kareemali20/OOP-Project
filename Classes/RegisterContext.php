<?php

include_once 'IRegester.php';
class RegisterContext{
    private $Reg1;

    public function __construct(Register $R){
        $this->Reg1 = $R;
    }

    public function RegisterUser(){
        $this->Reg1->RegisterAsUserType();
    }
}