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

        h1{
            text-align:center;
            font-family:arial;
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

    <h1>List All Users</h1>

    <table class="center">
    
    <?php 
    include '../Classes/User.php';
    $User1 = new User("../TextFiles/Users.txt","~");
    $User2 = $User1->ListAllUsers();
    

    for($i=0;$i<count($User2);$i++){
        echo "<tr>"; 
            echo "<td>".$User2[$i]->getId()."</td>";
            echo "<td>".$User2[$i]->getName()."</td>";
            echo "<td>".$User2[$i]->getEmail()."</td>";
            echo "<td>".$User2[$i]->getPassword()."</td>";
            echo "<td>".$User2[$i]->getAge()."</td>";
            if($i!=0){
                echo "<td> <a href = DeleteUser.php?Id=".$User2[$i]->getID()."> Delete </a>  </td>";
                echo "<td> <a href = UpdateUser.php?Id=".$User2[$i]->getID()."> Update </a> </td>";
            }
        echo "</tr>";
    }
    ?>
    
    
    <td>
    <a href="AddUser.html">Add User</a>
    </td>

   </table>



</body>
</html>