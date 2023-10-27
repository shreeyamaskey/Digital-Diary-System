<?php

try {
    session_start();

$Name = "";
$Birthdate = "";
$Username = "";
$errors = array();


include "initialconn.php";

if (isset($_POST['signup'])){
    //variables
    $Name = mysqli_real_escape_string($conn, $_POST['name']);
    $Birthdate = mysqli_real_escape_string($conn,$_POST['birthdate']);
    $Username = mysqli_real_escape_string($conn, $_POST['username']);
    $Password_1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $Password_2 = mysqli_real_escape_string($conn,$_POST['password2']);

    //ensuring that the fields in the form are filled properly

    if(empty($Name)){
        array_push($errors, "Name is required");
    }
    if(empty($Birthdate)){
        array_push($errors, "Birthdate is required");
    }
    if(empty($Username)){
        array_push($errors, "Username is required");
    }
    if(empty($Password_1)){
        array_push($errors, "Password is required");
    }

    if($Password_1 != $Password_2){
        array_push($errors, "The two passwords do not match");
    }

    //validate whether there is an existing user with the same username or password
    $Password = hash('sha256', $Password_1);
    $validation = "SELECT * FROM User WHERE Username = '$Username' OR Password = '$Password' ";

    $result = mysqli_query($conn,$validation);

    $num = mysqli_num_rows($result);

    if ($num == 1) {
        array_push($errors, "The username and password you entered are in use. Please choose another username and password.");
    }

    // if no errors then proceed to save the date to the database

    if (count($errors) == 0){
        $_SESSION['user'] = $Username;
        $Password = hash('sha256', $Password_1);
        $sql = "INSERT INTO User (Name, Birthdate, Username, Password) VALUES ('$Name', '$Birthdate', '$Username', '$Password')";
        mysqli_query($conn,$sql);
        ?>
        <!DOCTYPE html>
        <html>
        <body>
            
        <script>
        
        alert("You have successfully created your diary and logged in!");
        
        </script>
        
        </body>
        </html>
    
        <?php
    
        header("refresh:0; url=/Digital Diary System/index.php");
    
    
    }
        
}

$conn->close();
} catch (mysqli_sql_exception $e) {
    $err = $e->getMessage();
    echo $err;
}



?>
