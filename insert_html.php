<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet" >
</head>
<body>
    <h1> PHP CRUD </h1>
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
<!-- Session Variable. -->
<?php if(isset($_SESSION['msg'])) { ?>
    <div class="msg" >
        <?php  echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        ?>
    </div>
<?php } ?>
<!-- Search Query -->
<?php 
if(isset($_POST['search']))
{
    //Get name from input field.
    $data = $_POST['name'];
    //Connection built here.
    $query = mysqli_query($dbConnection, "SELECT * FROM info WHERE name  LIKE '%$data%' ");
    // Return the number of rows on which the data is matched.
    $queryResult = mysqli_num_rows($query);
    //If query runs successfully..
    if(! $query ) 
        {
            die('Could not get data: ');
        }
    echo "<div class='text'>"."There are ". $queryResult ." rows on which the data has been matched "."</br>"."Result here : "."</div>";
    if($queryResult >0 )
    {
        while ($row = mysqli_fetch_array($query)) 
        { 
         echo "<div class='msg'>".$row['name']."</br>"."</div>";
        }    
    }
    else
    {
        echo "no result" ;
    }
}
?>
<?php 
include 'db.php' ;
// When edit button clicked.
if(isset($_GET['edit']))
{
    //get the if from above and then query runs.
  $sq = "SELECT * from info WHERE id = ".$_GET['edit'];
  //Connection make here.
  $query = mysqli_query($dbConnection,$sq);
  //Fetch data from above $query variable.
  $row = mysqli_fetch_array($query);
  //When update button is clicked.
  if(isset($_POST['update']))
{
    //get name from input field.
    $name = $_POST['name'];
    //query runs here and get the id of that update field.
    $update = "UPDATE info SET name='$name' WHERE id=".$_GET['edit'];
    //Connection make here.
    $upd = mysqli_query($dbConnection ,$update);
    //if update query.successfully runs.
    if($upd){
        header('location:insert_html.php');
    }
    else{
        echo "ERROR";
    }
}
}   
?>
<!-- Search Form -->
<div class ="main">
<div class="search"> 
<form action="insert_html.php" method="POST">
<h3>Search Here:</h3>
    <input type="text" name="name"  />
	<button type="submit" name="search" />Find</button>
</form>
</div>
<!-- Save Form -->
<div class="save">
<form action="insert_php.php" method="POST">
<h3>Enter Here:</h3>
        <input type="text" name="name"  >
        <button type="submit" name="save" >Save</button>
</form>
</div>
</div>

<!-- Fetch the data which has been stored in database.  -->
<table class="table-content"> 
<thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <!-- looping for fetching the data. -->
<?php while ($row = mysqli_fetch_array($result)) { ?>
<tbody>
<tr>
<!-- ID and Name displayed here. -->
<td> <?php echo $row['id'] ?> </td> 
<td> <?php echo $row['name'] ?> </td> 
<!-- Edit and Delete Button -->
<td > <a href="edit_php.php?edit=<?php echo $row['id']?>"> Edit</a> </td>
<td> <a href="insert_php.php?delete=<?php echo $row['id']?>"> Delete</a> </td>
</tr>
</tbody>
<?php } ?>
</table>
</body>
</html>