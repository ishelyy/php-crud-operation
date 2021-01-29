<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP </title>
    <link href="style.css" rel="stylesheet" >

</head>
<body>
    <?php 
include 'insert_php.php';
include 'db.php' ;
?>
<!-- Index Page -->
<?php if(isset($_GET['entry_page']))
    {
        //render to 'insert.html' Page.
        header('location: insert_html.php');
    }
?>
<!-- Index Page -->
<form class="index-form" action="insert_html.php">
   <button  name="entry_page" ><h1> PHP CRUD <h1></button> 
    <form>
</body>
</html>