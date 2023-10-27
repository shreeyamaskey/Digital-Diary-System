<?php 

require_once ("entries.php");

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

    <!-- css styling -->
    <link rel="stylesheet" href="../css/adminstyle.css">
    <!-- x css styling x --> 

    <!-- css admin styling -->
    <link rel="stylesheet" href="../css/admin.css">
    <!-- x css admin styling x --> 
 
    <title>Add posts</title>
</head>
<body>
    <header>
        <div class="logo"> 
            <h1 class="logo-text">Digital Diary</h1>
        </div>

    </header>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="index.php" class="button btn_big">Go Back</a>
            </div>

            <div class="contents">
                <h2 class="page-title">Add entry</h2>

                <form action="entries.php" method="POST" enctype="multipart/form-data">

                    <div>
                        Title:
                        <input type="text" name="title" class="text-input">
                    </div>
                    <div>
                        Body: 
                        <textarea name="body" id="body"></textarea>
                    </div>
                    <div>
                        Image:
                        <input type="file" name="image" class="text-input"/>
                    </div>
                    <div>
                        <input type="submit" name="add" value="Create Entry" class="button btn_big">
                    </div>
                </form>
            </div>

        </div>
        <!-- x Admin Content x -->



    </div>

    <!-- x Page Wrapper x -->



<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<!-- x JQuery x -->

<!-- Ckeditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
<!-- x Ckeditor x -->

<!-- Script for clickEvent -->
<script src="../javascript/scripts.js"></script>
<!-- x Script for clickEvent x -->

</body>
</html>