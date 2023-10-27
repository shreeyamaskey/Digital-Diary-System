<?php 
session_start();
if (!isset($_SESSION['user'])) {
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>

    <div id="container"> 
        <div id="header">
            <h1>Welcome <?php echo $_SESSION['user']; ?> to your very own Digital Diary</h1>
        </div>

        <div id="content">

            <div id="nav">
                <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="entries/index.php">Entries</a></li>
                <li><a href="planner/index.php">Planner</a></li>
                <li><a href="expenses/index.php">Expenses</a></li>
                <li style="float:right"><a href="logout.php" >Log Out</a></li>

                </ul>
            </div>


            <div id="main">
                <h2>Home Page</h2>

                <p>Hello! If you need any guidance with the web-application, you can always come to the Home page :)</p>
                           <br>     
                <h2>Help If Needed</h2>
                <div class="row">
                    <div class="column">
                        <div class="card">
                        <div class="help_container">
                            <h2>Entries (Create)</h2>
                            <p>You can create your daily journal entries!</p>
                            <p><button class="button"> <a href="help/how_to.php?id= 1">How to?</a></button></p>

                        </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="card">
                        <div class="help_container">
                            <h2>Entries (Search and Sort)</h2>
                            <p>You can easily search and sort through your entries!</p>
                            <p><button class="button"> <a href="help/how_to.php?id= 2">How to?</a></button></p>
                        </div>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card">
                        <div class="help_container">
                            <h2>Entries (Edit and Delete)</h2>
                            <p>You can edit or delete your entry if you have anything new to add or change!</p>
                            <p><button class="button"> <a href="help/how_to.php?id=3">How to?</a></button></p>
                        </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card">
                        <div class="help_container">
                            <h2>Expenses (Save)</h2>
                            <p>You can save your monthly expenses or savings and keep track of it!</p>
                            <p><button class="button"> <a href="help/how_to.php?id=4">How to?</a></button></p>
                        </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card">
                        <div class="help_container">
                            <h2>Expenses (Search and Sort)</h2>
                            <p>You can easily search and sort through your expenses, etc.</p>
                            <p><button class="button"> <a href="help/how_to.php?id=5">How to?</a></button></p>
                        </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card">
                        <div class="help_container">
                            <h2>Expenses (Edit and Delete)</h2>
                            <p>You can edit or delete your expenses if you have anything additional or a change!</p>
                            <p><button class="button"> <a href="help/how_to.php?id=6">How to?</a></button></p>
                        </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card">
                        <div class="help_container">
                            <h2>Planner (Add)</h2>
                            <p>You can add an event to the planner!</p>
                            <p><button class="button"> <a href="help/how_to.php?id=7">How to?</a></button></p>
                        </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card">
                        <div class="help_container">
                            <h2>Planner (Update)</h2>
                            <p>You can update an event of the planner!</p>
                            <p><button class="button"> <a href="help/how_to.php?id=8">How to?</a></button></p>
                        </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="card">
                        <div class="help_container">
                            <h2>Planner (Delete)</h2>
                            <p>You can delete an event from the planner!</p>
                            <p><button class="button"> <a href="help/how_to.php?id=9">How to?</a></button></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="footer">
                <p>Digital Diary</p>
            </div>
        </div>
    </div>


</body>
</html>