<?php

try {

    session_start();

    $Username = "";
    $errors = array();

    include "initialconn.php";


    if (isset($_POST['login'])) {
        //variables
        $Username = mysqli_real_escape_string($conn, $_POST['username']);
        $Password_1 = mysqli_real_escape_string($conn, $_POST['password1']);

        if (empty($Username)) {
            array_push($errors, "Username is required");
        }
        if (empty($Password_1)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            //validate whether there is an existing user with the same username or password
            $Password = hash('sha256', $Password_1);

            $validation = "SELECT * FROM User WHERE Username = '$Username' AND Password = '$Password' ";

            $result = mysqli_query($conn, $validation);

            $num = mysqli_num_rows($result);


            if ($num == 1) {
                $_SESSION['user'] = $Username;
?>
                <!DOCTYPE html>
                <html>

                <body>

                    <script>
                        alert("You have successfully logged in!");
                    </script>

                </body>

                </html>

            <?php

                header("refresh:0; url=/Digital Diary System/index.php");
            }
            //insert into database
            else {
            ?>
                <!DOCTYPE html>
                <html>

                <body>

                    <script>
                        alert("The combination of username and password does not exist");
                    </script>

                </body>

                </html>
<?php
                header("refresh:0; url=login.php");
            }
        }
    }

    $conn->close();
} catch (mysqli_sql_exception $e) {
    $err = $e->getMessage();
    echo $err;
}
?>