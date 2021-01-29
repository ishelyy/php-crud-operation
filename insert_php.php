<?php
include 'db.php' ;
session_start();

  $dbConnection = new mysqli('localhost','root','','php_crud');

    if(isset($_POST['save']))
    {
      $id =$_POST['id'];
      $name =$_POST['name'];
      $query = "INSERT INTO info (name) VALUES ('$name')";
      $_SESSION['msg'] = "DATA SAVED" ;
      mysqli_query($dbConnection,$query);
      header('location:insert_html.php');
    }
    $result = mysqli_query( $dbConnection,"SELECT * FROM info");
    
    if(! $result ) {
      die('Could not get data: ');
   }

   
   if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
   $sql = mysqli_query($dbConnection ," DELETE FROM info WHERE id=$id");
    if($sql){
        header('location:insert_html.php');
    }
    else{
        echo "ERROR";
    }
}


?>
