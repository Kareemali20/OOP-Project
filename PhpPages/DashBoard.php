<!DOCTYPE html>
<html lang="en">
    <style>

        table,th,td{
            font-family: arial;
            border: 1px solid;
            text-align: center;
            padding: 5px;
        }

        .center {
        margin-left: auto;
        margin-right: auto;
        border: 4px solid darkblue;
        border-radius: 5px;
        border-style: inset;

        }
        
        .center2{
        margin-left: auto;
        margin-right: auto;
        display: flex;
        }

        .UserForm{
            margin:10px;
            text-align:center;
        }

        a{
            margin:10px;
        }
        body{
            background-color:rgb(201, 225, 247);
        }
    </style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class ="center2">
<table class="center">
    
    <?php 
    include '../Classes/User.php';
    $User1 = new User("../TextFiles/Users.txt","~");
    
    $User1->FileManager->DrawTableFromFile();
    ?>
    
    
            <td>
                <a href="AddUser.html">Add User</a>
            </td>

    
    

   </table>
</div>
  
    <?php
    ?>

</body>
</html>