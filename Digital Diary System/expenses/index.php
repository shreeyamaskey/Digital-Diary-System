<?php

include("../functions/functions.php");

include("../database/database.php");
$db = new OtherActions;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/59b134785e.js" crossorigin="anonymous"></script>

    <!-- CSS BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/expenses.css" type="text/css" />

    <style>
        thead {
            cursor: pointer;
        }
    </style>

</head>

<?php
try {
    //break php
?>

    <body>



        <main class="bg-light">
            <div class="container text-center">
                <h2 class="bg-dark text-light rounded"><i class="fas fa-receipt"></i> Expenses
                </h2>

                <div class="button-group justify-content-right">
                    <a href="../index.php" class="btn btn-info">Home</a>
                </div>

                <div class="calculator">
                    <form>
                        <input type="text" name="val1" placeholder="1st Value">
                        <input type="text" name="val2" placeholder="2nd Value">
                        <select name="operator">
                            <option>None</option>
                            <option>Add</option>
                            <option>Subtract</option>
                            <option>Multiply</option>
                            <option>Divide</option>
                        </select>
                        <br>
                        <button type="submit" name="submit" value="submit">Calculate</button>
                    </form>
                    <p>The value is: </p>
                    <?php
                    if (isset($_GET['submit'])) {
                        $result1 = $_GET['val1'];
                        $result2 = $_GET['val2'];
                        $operator = $_GET['operator'];
                        switch ($operator) {
                            case "None":
                                echo "You need to select a method!";
                                break;
                            case "Add":
                                echo $result1 + $result2;
                                break;
                            case "Subtract":
                                echo $result1 - $result2;
                                break;
                            case "Multiply":
                                echo $result1 * $result2;
                                break;
                            case "Divide":
                                echo $result1 / $result2;
                                break;
                        }
                    }

                    ?>


                </div>


                <div class="insert justify-content-center">


                    <form action="../database/actions.php" method="POST">
                        <div class="input-group">
                            <?php inputFunc1("Month", "month", "text", "month"); ?>
                        </div>
                        <div class="input-group">
                            <?php inputFunc1("Year (_ _ _ _)", "year", "number", "year"); ?>
                        </div>
                        <div class="input-group">
                            <?php inputFunc1("Savings", "savings", "number", "savings"); ?>
                        </div>
                        <div class="input-group">
                            <?php inputFunc1("Expenses", "expenses", "number", "expenses"); ?>
                        </div>
                        <div class="input-group">
                            <?php inputFunc1("Final Savings", "finalsavings", "number", "finalsavings"); ?>
                        </div>
                        <div class="button-group">
                            <?php buttonFunc("submit", "save", "btn btn-dark", "Save"); ?>


                        </div>

                    </form>
                </div>


                <input type="text" id="myMonth" onkeyup="searchMonth()" placeholder="Search for months.." title="Type in a month">
                <input type="text" id="myYear" onkeyup="searchYear()" placeholder="Search for year.." title="Type in a year">
                <?php //buttonFunc("submit", "search", "btn btn-primary", "Search"); 
                ?>
                <!-- do a break then make a div and keep search there -->
                <br>


                </br>

                <!-- bootstrap table -->
                <div class="d-flex table-data">
                    <table class="table table-bordered table-secondary table-hover" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th onclick="sortTable(0)">ID</th>
                                <th onclick="sortTable(1)">Month</th>
                                <th onclick="sortTable(2)">Year</th>
                                <th onclick="sortTable(3)">Savings</th>
                                <th onclick="sortTable(4)">Expenses</th>
                                <th onclick="sortTable(5)">Final Savings</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php

                            $list = $db->view('Expenses');
                            foreach ($list as $key => $value) {
                                //break php
                            ?>

                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['Month']; ?></td>
                                    <td><?php echo $value['Year']; ?></td>
                                    <td><?php echo $value['Savings']; ?></td>
                                    <td><?php echo $value['Expenses']; ?></td>
                                    <td><?php echo $value['FinalSavings']; ?></td>
                                    <td><a href="edit.php?id=<?php echo $value['id']; ?>" type="button" class="btn btn-success">Update</a></td>
                                    <?php echo "<td><a href=\"delete.php?id=" . $value['id'] . "\" type='button' class='btn btn-danger' onClick=\"javascript:return confirm('Are you sure you want to delete this?');\">Delete</a></td>"; ?>
                                </tr>

                            <?php }



                            ?>

                        </tbody>
                    </table>
                </div>

                <script>
                    function sortTable(n) {
                        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                        table = document.getElementById("myTable");
                        switching = true;
                        //Set the sorting direction to ascending:
                        dir = "asc";
                        /*Make a loop that will continue until
                        no switching has been done:*/
                        while (switching) {
                            //start by saying: no switching is done:
                            switching = false;
                            rows = table.rows;
                            /*Loop through all table rows (except the
                            first, which contains table headers):*/
                            for (i = 1; i < (rows.length - 1); i++) {
                                //start by saying there should be no switching:
                                shouldSwitch = false;
                                /*Get the two elements you want to compare,
                                one from current row and one from the next:*/
                                x = rows[i].getElementsByTagName("TD")[n];
                                y = rows[i + 1].getElementsByTagName("TD")[n];
                                /*check if the two rows should switch place,
                                based on the direction, asc or desc:*/
                                if (dir == "asc") {
                                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                        //if so, mark as a switch and break the loop:
                                        shouldSwitch = true;
                                        break;
                                    }
                                } else if (dir == "desc") {
                                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                        //if so, mark as a switch and break the loop:
                                        shouldSwitch = true;
                                        break;
                                    }
                                }
                            }
                            if (shouldSwitch) {
                                /*If a switch has been marked, make the switch
                                and mark that a switch has been done:*/
                                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                switching = true;
                                //Each time a switch is done, increase this count by 1:
                                switchcount++;
                            } else {
                                /*If no switching has been done AND the direction is "asc",
                                set the direction to "desc" and run the while loop again.*/
                                if (switchcount == 0 && dir == "asc") {
                                    dir = "desc";
                                    switching = true;
                                }
                            }
                        }
                    }
                </script>

                <script>
                    function searchMonth() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("myMonth");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[1];
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>

                </script>

                <script>
                    function searchYear() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("myYear");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[2];
                            if (td) {
                                txtValue = td.textContent || td.innerText;
                                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                    tr[i].style.display = "";
                                } else {
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                </script>



            </div>
        </main>
        <!-- JS BOOTSTRAP-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

    <?php
} catch (Exception $e) {
    $err = $e->getMessage();
    echo $err;
}
    ?>

    </body>

</html>