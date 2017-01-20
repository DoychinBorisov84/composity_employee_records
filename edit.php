<?php
session_start();
//Credentials for our MySql DB
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_database = 'rest';

$link = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_database);

$ide = $_SESSION['ide'];


if(isset($_GET['submit'])){
  $name = $_GET['name'];
  $from = $_GET['from'];
  $to = $_GET['to'];

  $sql = " UPDATE employe SET name='$name' WHERE id='$ide' ";

    if($connect = mysqli_query($link, $sql)){
      echo 'Record edited';
    }
    else{
      echo 'Oops something went wrong';
    }
}

?>

<a href="rest_api.php">Go Back </a>
 <form action="edit.php" method="GET">
 Add time for absence of the Employees :<br>
   <label for="name"><input type="text" name="name" value="Name">
   <label for="from"><input type="text" name="from" value="From time">
   <label for="to"><input type="text" name="to" value="To time">
                  <input type="submit" name="submit" value="Add">

 </form>
