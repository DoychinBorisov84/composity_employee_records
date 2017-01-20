<?php
//Credentials for our MySql DB
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_database = 'rest';

$link = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_database);

$id = $_GET['id'];
$sql = " DELETE FROM employe WHERE id='$id' ";

if($connect = mysqli_query($link, $sql)){
  echo 'Deleted Successfully';
}
else{
  echo 'Error Deleting';
}

 ?>
<a href="rest_api.php">Go Back </a>
