<?php include 'database/connect.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- css styling -->
    <link media="all" rel="stylesheet" type="text/css" href="css/style.css"/>
    <!-- x css styling x -->
</head>
<body>
    <div class="title">
        <h2>Sign Up</h2>
    </div>

    <form action="signup.php" method="post">

        <?php include('errors.php');?>

        <div class="text-input">
            Name: <input type="text" name="name" value="<?php echo $Name; ?>">
        </div>
        <div class="text-input">
            Birthdate: <input type="date" name="birthdate" placeholder="yyyy-mm-dd" value="<?php echo $Birthdate; ?>">
        </div>
        <div class="text-input">
            Username: <input type="text" name="username" value="<?php echo $Username; ?>">
        </div>
        <div class="text-input">
            Password: <input type="password" name="password1">
        </div>
        <div class="text-input">
            Confirm Password: <input type="password" name="password2">
        </div>
        <div class="text-input">
            <button type="submit" name="signup" class="button">Sign Up</button>
        </div>
        <p>
            Already signed up? <a href="login.php"> <u><b>Log in</b></u></a>
        </p>
        
    </form>


</body>
</html>