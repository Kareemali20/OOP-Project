<!DOCTYPE html>
<html lang="en">
<style>
        .Form{
            
            border: 4px solid darkblue;
            border-radius: 5px;
            border-style: inset;
            padding: 10px;
            text-align: center;
            padding-left: center;
            margin: auto;
            width: 30%;
  
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

   

<div class="Form">
        
        <form method="post" class="UserForm" action="UpdateUser2.php">
            <label for="Name">Full Name </label><br>
            <input type="text" id="Name" name ="Name"><br>


            <label for="Email">Email </label><br>
            <input type="email" id="Email" name ="Email"><br>

            <label for="Password">Password </label><br>
            <input type="password" id="Password" name ="Password"><br>


            <label for="Age">Age </label><br>
            <input type="text" id="Age" name ="Age"><br>

            <br>
            <button type="submit" class="button">  Submit </button> 
            <br>
            <br>

        </form>
    
    

</div>

    
</body>
</html>