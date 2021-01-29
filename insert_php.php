<?php
//Database
include 'db.php' ;
//Session;
session_start();
//Connection.
  $dbConnection = new mysqli('localhost','root','','php_crud');
//When save button clicked.
    if(isset($_POST['save']))
    {
      //Get id and name .
      $id =$_POST['id'];
      $name =$_POST['name'];
      //Save the value of name in database.
      $query = "INSERT INTO info (name) VALUES ('$name')";
      //Session start here.
      $_SESSION['msg'] = "DATA SAVED" ;
      //Connection of database and query.
      mysqli_query($dbConnection,$query);
      //Rendering.
      header('location:insert_html.php');
    }
    //Select query 
    $result = mysqli_query( $dbConnection,"SELECT * FROM info");
    //If the result added successfully.
    if(! $result ) {
      die('Could not get data: ');
   }

   //Delete button
   if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    //Query with connection.
   $sql = mysqli_query($dbConnection ," DELETE FROM info WHERE id=$id");
   //if query runs properly.
    if($sql){
        header('location:insert_html.php');
    }
    else{
        echo "ERROR";
    }
}
?>
