<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" >
    <title>PHP Crud</title>
</head>
<body>
<?php 
//Database
include 'db.php';
//If edit button clicked.
if(isset($_GET['edit']))
{ 
    //Select from database with id.
  $sq = "SELECT * from info WHERE id = ".$_GET['edit'];
  //make connection with db and above query.
  $query = mysqli_query($dbConnection,$sq);
  //Fetching the database.
  $row = mysqli_fetch_array($query);

  //When update button is clicked.
  if(isset($_POST['update']))
{
    //Get name from input field.
    $name = $_POST['name'];
    //Udate query runs here with id.
    $update = "UPDATE info SET name='$name' WHERE id=".$_GET['edit'];
    //Connection built here.
    $upd = mysqli_query($dbConnection ,$update);
    //if update
    if($upd){
        header('location:insert_html.php');
    }
    else{
        echo "ERROR";
    }
}}   
?>

<!-- Search Data here.  -->
<form method="POST" >
<h3>Edit Here:</h3>
<label for="name"> Name </label> <input type="text" name="name"  value="<?php echo $row['name']; ?>">
<button  name="update"> Update</button>
</form>

</body>
</html>

