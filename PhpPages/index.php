<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../View Pages/Users.css?v=<?php echo time();?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="containter">

<form action="DeleteMultiple.php" method="post">
    <div class="center">
        <h1> List All Users </h1>
            <table>
                
                <?php 
                include '../Classes/User.php';
                $User1 = new User("../TextFiles/Users.txt","~");
                $User1 = $User1->ListAllUsers();

                
                for($i=0;$i<count($User1);$i++){
                    echo "<tr>"; 
                        echo "<td>".$User1[$i]->getId()."</td>";
                        echo "<td>".$User1[$i]->getName()."</td>";
                        echo "<td>".$User1[$i]->getEmail()."</td>";
                        echo "<td>".$User1[$i]->getPassword()."</td>";
                        echo "<td>".$User1[$i]->getAge()."</td>";
                        echo "<td>".$User1[$i]->getUserType()."</td>";
                        if($i!=0){
                            echo "<td> <a href = DeleteUser.php?Id=".$User1[$i]->getID()."> Delete </a>  </td>";
                            echo "<td> <a href = UpdateUser.php?Id=".$User1[$i]->getID()."> Update </a> </td>";
                            echo "<td> <input type = checkbox name = Select[] value = ".$User1[$i]->getID()." > </td>";
                        }
                    echo "</tr>";
                }
                ?>
              
                
                <td>
                <a href="../View Pages/AddUser.html">Add User</a>
                </td>
                <td>
                    <input class = "Button" type = "submit" value = "Delete All">
                </td>

            </table>
            
        </form>
    </div>
</div>

    <div class= "Table2">
            <h1> Users Type </h1>
            <div class="form2">
            <table>
            <?php
                
                include_once '../Classes/UserType.php';
                $UserTypeObj = new  UserType("../TextFiles/Usertype.txt","~");
                $UserTypeObj = $UserTypeObj->ListAllUsers();

                foreach($UserTypeObj as $User){
                    echo "<tr>";
                    echo "<td>".$User->getID()."</td>";
                    echo "<td>".$User->getName()."</td>";
                    echo "<td>".$User->getUserType()."</td>";
                    echo "</tr>";
                }

                ?>
            </table>
            </div>
    </div>
    


</body>
</html>