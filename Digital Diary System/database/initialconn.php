<?php

$conn = mysqli_connect('localhost', 'S_12$M-83', 'J5oM2kLBrNL1wGwk');

//checkking connection
if(!$conn)
{
    echo 'Not connected to server';
}

//checking database connection
if(!mysqli_select_db($conn, 'Computer_IA'))
{
    echo 'Database not selected';
}

?>