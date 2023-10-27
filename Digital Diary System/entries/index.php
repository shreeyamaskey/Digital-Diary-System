<?php
include_once 'entries.php';
$result = mysqli_query($conn, "SELECT * FROM Entries");


try {
    //code...
} catch (Exception $e) {
    $err = $e->getMessage();
    echo $err;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome-->
    <script src="https://kit.fontawesome.com/ad9fa19830.js" crossorigin="anonymous"></script>
    <!-- x Font Awesome x -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Amaranth:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <!-- x Google Fonts x -->

    <!-- css admin styling -->
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <!-- x css admin styling x -->

    <!-- css styling -->
    <link rel="stylesheet" href="../css/adminstyle.css">
    <!-- x css styling x -->

    <style>
        thead {
            cursor: pointer;
        }
    </style>

    <title> Manage entries</title>
</head>

<body>
    <header>
        <div class="logo">
            <h1 class="logo-text">Digital Diary</h1>
        </div>

    </header>

    <main>

        <!-- Admin Page Wrapper -->
        <div class="admin-wrapper">

            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="../index.php" class="button btn_big">Home</a>
                    <a href="add.php" class="button btn_big">Add Entry</a>
                    <a href="index.php" class="button btn_big">Manage Entries</a>
                </div>

                <div class="contents">
                    <h2 class="page-title">Manage entries</h2>

                    <input type="text" id="myTitle" onkeyup="searchTitle()" placeholder="Search for title.." title="Type in a title">
                    <input type="text" id="myDate" onkeyup="searchDate()" placeholder="Search for time/date.." title="Type in a date or time">

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                        <table id="addEntry">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)">SN.</th>
                                    <th onclick="sortTable(1)">Title</th>
                                    <th onclick="sortTable(2)">Date & Time</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>

                            <tbody id="">
                                <?php
                                $i = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><a href="encryption/index.php?id=<?php echo $row["id"]; ?>"><?php echo $row["title"]; ?> </a></td>
                                        <td><?php echo $row["created_at"]; ?></td>
                                        <td><a href="Edit/index.php?id=<?php echo $row["id"]; ?>" type="button" class="edit">Edit</a></td>
                                        <?php
                                        echo "<td><a href='delete_entry.php?id=" . $row["id"] . "' type=\"button\" class=\"delete\" onClick=\"javascript:return confirm('Are you sure you want to delete this?');\">Delete</a></td>";
                                        ?>

                                    </tr>
                                <?php
                                    $i++;
                                }
                                ?>
                            </tbody>

                        </table>
                    <?php

                    } else {
                        echo "No result found";
                    }
                    ?>
                </div>

            </div>
            <!-- x Admin Content x -->



            <script>
                function sortTable(n) {
                    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                    table = document.getElementById("addEntry");
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
                function searchTitle() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("myTitle");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("addEntry");
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
                function searchDate() {
                    var input, filter, table, tr, td, i, txtValue;
                    input = document.getElementById("myDate");
                    filter = input.value.toUpperCase();
                    table = document.getElementById("addEntry");
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

        <!-- x Page Wrapper x -->

    </main>



    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <!-- x JQuery x -->

    <!-- Script for clickEvent -->
    <script src="../javascript/scripts.js"></script>
    <!-- x Script for clickEvent x -->

</body>

</html>