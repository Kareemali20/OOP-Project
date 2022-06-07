<?php
include_once '../Classes/UserType.php';

function ValidateAndSignup()
{
    session_start();
    $UserType = $_SESSION['UserType'];
    if ($UserType < 0 || $UserType == 0 || $UserType > 3) {
        header("location:Signup.html");
    }
    else {

        $UserTypeObject = new UserType("../TextFiles/Usertype.txt", "~");
        $UserTypeObject = $UserTypeObject->getRegisterInfo($UserType);

        echo '<div class="text_field">' .
            '<input type="text" name="Type" required>' .
            '<span>' .
            '</span>' .
            '<label>' . $UserTypeObject->AddUserTypeAttribute() . '</label>'
            . '</div>';
    }

}
