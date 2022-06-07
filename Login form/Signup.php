<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <div class="center">
        <h1> Sign up </h1>
        <form  action = "Signup2.php" method="post" >
            <div  class="text_field">
                <input type="text" name="Name" required>
                <span>

                </span>
                <label> Name </label>
            </div>

            <div class="text_field">
                <input type="text" name="Email"  required>
                <span>

                </span>
                <label> Email </label>
            </div>
            <div class="text_field">
                <input type="password" name="Password" required>
                <span>

                </span>
                <label> Password </label>
            </div>
            <div class="text_field">
                <input type="age" name="Age" required>
                <span>

                </span>
                <label> Age </label>
            </div>
            <?php
            include_once 'Signup1.php';
            include_once '../Classes/RegisterContext.php';

            ValidateAndSignup();
            if(isset($_POST['UT'])){
                $_SESSION['UserType'] = $_POST['UT'];
            }
            ?>
                        
            <input type="submit" value="Sign up">
            <div class="signup">
                Already a member? <a href="index.html"> Sign in</a>
            </div>
        </form>
    </div>    
</body>
</html>