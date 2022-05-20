<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../View Pages/Users.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="center">
    <h1> List All Users </h1>
<table class="#">
    
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
    <a href="../View Pages/AddUser.html">Add User</a>
    </td>

   </table>

</div>
    


</body>
</html>