<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View Pages/UpdateUser.css">
    
    <title>Document</title>
</head>
<body>

<div class="center">
        <h1> Update User </h1>
        <form action="UpdateUser2.php" method="post" >
            <div class="text_field">
                <input type="text" id="Name"
                name="Name" required>
                <span>

                </span>
                <label> Name </label>
            </div>

            <div class="text_field">
                <input type="email" id="Email"
                name="Email" required>
                <span>

                </span>
                <label> Email </label>
            </div>
            <div class="text_field">
                <input type="password" id = "Password" name="Password"required>
                <span>

                </span>
                <label> Password </label>
            </div>
            <div class="text_field">
                <input type="text" id="Age" name="Age" required>
                <span>

                </span>
                <label> Age </label>
            </div>
            
            <input type="submit" value="Update Information">
            
            <?php
                session_start();
                $_SESSION['Id'] = $_GET["Id"];
            ?>

        </form>
    </div>    

    
</body>
</html>