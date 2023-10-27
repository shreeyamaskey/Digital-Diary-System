<?php

include "database.php";

class DataActions extends Database
{
    public function insert($table, $fields){
        //insert query
        $sql = "";
        $sql .= "INSERT INTO ".$table;
        $sql .= " (".implode(",", array_keys($fields)).") VALUES ";
        $sql .= "('".implode("','", array_values($fields))."')";
        $query = mysqli_query($this->conn,$sql);
        if($query){
            return true;
        }
    }

}

$obj = new DataActions;
if(isset($_POST['save'])){
    $myArray = array(
        "month" => $_POST["month"],
        "year" => $_POST["year"],
        "savings" => $_POST["savings"],
        "expenses" => $_POST["expenses"],
        "finalsavings" => $_POST["finalsavings"]
    );

    if($obj->insert("Expenses",$myArray)){

        ?>
            <!DOCTYPE html>
            <html>
            <body>
                
            <script>
            
            alert("Values saved!");
            
            </script>
            
            </body>
            </html>

            <?php

            header("refresh:0; url=../expenses/index.php");

        }
        //insert into database
        else {
            ?>
            <!DOCTYPE html>
            <html>
            <body>
                
            <script>
            
            alert("There was an error. Please try again.");
            
            </script>
            
            </body>
            </html>
            <?php
            header("refresh:0; url=../expenses/index.php");
        }
    
    
}

if(isset($_POST[''])){

}

?>