<?php 

include_once "../database/initialconn.php";

$result = $conn->query("SELECT * FROM help WHERE id='" . $_GET['id'] . "'");

while($row = $result->fetch_assoc()){
    $info = $row['info'];
    $title = $row['title'];


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/entries.css" type="text/css"/>
</head>
<body>
    <div class="button-group">
        <a href="../index.php" class="button btn_big">Go Back</a>
    </div>
    <div id="grad">
        <?php
        echo '<h1>'.$title.'</h1>';
        echo '<br>';
        echo '<p> '.$info.' </p>';

        ?>
    </div>
</body>
</html>

