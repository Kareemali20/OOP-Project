<!DOCTYPE html>
<html lang="en">
    <style>

        table,th,td{
            border: 1px solid;
            padding: 5px;
        }

        .center {
        margin-left: auto;
        margin-right: auto;
        border: 3px solid;
        }

        .UserForm{
            margin:10px;
            text-align:center;
        }

        a{
            margin:10px;
        }

    </style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   <table class="center">

    <?php 
    include '../Classes/User.php';
    //include '../Classes/Student.php';
    $User1 = new User("../TextFiles/Users.txt","~");
    $User1->FileManager->DrawTableFromFile();
    ?>
    
    <tr>
            <td>
                <a href="AddUser.html">Add User</a>
            </td>
        </tr>

   </table>
    <?php
    ?>

</body>
</html>