<?php

session_start();
session_destroy();

unset($_SESSION['user']);
?>

<!DOCTYPE html>
<html>

<body>

    <script>
        alert("You are now logged out!");
    </script>

</body>

</html>
<?php
header("refresh:0; url=login.php");

?>