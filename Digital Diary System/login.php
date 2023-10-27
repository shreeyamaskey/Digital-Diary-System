<?php 

require_once("functions/functions.php");
include 'database/validation.php';



?>

<?php ("database/validation.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In to your Digital Diary</title>

    <!-- css styling -->
    <link href="css/style.css" media="all" rel="stylesheet" type="text/css">
    <!-- x css styling x -->
</head>
<body>
    <div class="title">
        <h2>Log In</h2>
    </div>

    <form method="post" action="login.php">
    
    <?php include('errors.php');?>
        
        <div class="text-input">
            <?php inputFunc("Username", "text", "username"); ?>

        </div>
        <div class="text-input">
            <?php inputFunc("Password", "password", "password1"); ?>
        </div>
        <div class="text-input">
            <button type="submit" name="login" class="button">Log In</button>
        </div>
        <p>
            Or<a href="signup.php"> <u> <b> create your diary here</b></u></a> 
        </p>
        
    </form>

</body>
</html>

