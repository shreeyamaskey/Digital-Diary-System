<?php

include "../database/initialconn.php";


$sql = "DELETE FROM Expenses WHERE id='" . $_GET['id'] . "'";
if (mysqli_query($conn, $sql)) {
    ?>
    <!DOCTYPE html>
    <html>
    <body>

    <script>

    alert("Deleted!");

    </script>

    </body>
    </html>

    <?php
        
}

else{
    ?>
    <!DOCTYPE html>
    <html>
    <body>
        
    <script>
    
    alert("Error deleting.. please try again.");
    
    </script>
    
    </body>
    </html>

    <?php

    header("refresh:0; url= index.php");
}
?>
<script type="text/javascript">
window.location.assign ("/Digital Diary System/expenses/index.php")
</script>
<?php

mysqli_close($conn);
?>



