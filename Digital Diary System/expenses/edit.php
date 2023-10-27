<?php
try {
    include_once '../database/initialconn.php';
    if(count($_POST)>0) {
        $sql = "UPDATE Expenses set id='" . $_POST['id'] . "', Month='" . $_POST['Month'] . "', 
            Year='" . $_POST['Year'] . "', Savings='" . $_POST['Savings'] . "' ,Expenses='" . $_POST['Expenses'] . "', 
            FinalSavings='" . $_POST['FinalSavings'] . "'  WHERE id='" . $_POST['id'] . "'";
        
        mysqli_query($conn, $sql);
        $message = "Successfully Updated!";
    }
    $result = mysqli_query($conn,"SELECT * FROM Expenses WHERE id='" . $_GET['id'] . "'");
    $row= mysqli_fetch_array($result);
} catch (mysqli_sql_exception $e) {
    $err = $e->getMessage();
    echo $err;
}


?>
<html>
<head>
<title>Update Expense Data</title>

<!-- CSS -->
<link rel="stylesheet" href="../css/expenses.css" type="text/css"/>

<!-- CSS BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>


<div class="insert justify-content-center">

            
    <form name="frmUpdate" action="" method="POST">

        <a href="index.php" class="btn btn-dark">Go Back</a>


        <div><?php if(isset($message)) { echo $message; } ?>
        </div>

        <div class="input-group">
            ID *do not edit* : <br>
            <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
            <input type="text" name="id"  value="<?php echo $row['id']; ?>">
            <br>
        </div>
        <div class="input-group">
            Month : <br>
            <input type="text" name="Month" class="txtField" value="<?php echo $row['Month']; ?>">
            <br>  
        </div>
        <div class="input-group">
            Year (_ _ _ _) :<br>
            <input type="number" name="Year" class="txtField" value="<?php echo $row['Year']; ?>">
            <br>
        </div>
        <div class="input-group">
            Savings :<br>
            <input type="number" name="Savings" class="txtField" value="<?php echo $row['Savings']; ?>">
            <br>
        </div>
        <div class="input-group">
            Expenses :<br>
            <input type="number" name="Expenses" class="txtField" value="<?php echo $row['Expenses']; ?>">
            <br>
        </div>
        <div class="input-group"> 
            Final Savings :<br>
            <input type="number" name="FinalSavings" class="txtField" value="<?php echo $row['FinalSavings']; ?>">
            <br>
        </div>
        <div class= "button-group">
            <input type="submit" name="update" value="Update" class="btn btn-success">
        </div>

    </form>
</div>



</body>
</html> 