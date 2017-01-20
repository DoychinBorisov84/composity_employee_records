<?php
session_start();
  //Creating credentials for the DB

  $mysql_host = 'localhost';
  $mysql_user = 'root';
  $mysql_pass = '';
  $mysql_database = 'rest';

  // Our query for displaying the whole info from DB PART 1 done --> showing ALL of DB and connected to the DB
  $sql = "SELECT * FROM employe";
  $link = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_database);

if($connect = mysqli_query($link, $sql)){
    //echo 'Connected to the Database'.'<br>';

    if(mysqli_num_rows($connect) > 0){
      while($row = mysqli_fetch_assoc($connect)){
        //echo 'The person ' . $row['name'].' missed from: '. $row['from_period'].' to : '. $row['to_period'].'<br>' ;
            if(isset($_GET['list'])){
              echo '<p>'.'Employee: '. '<span>'.$row['name']. '</span>'.' was missing from:'. $row['from_period'].' to: '. $row['to_period'].
              '<a href='.'edit.php?id='.$row['id'].'>'.'&nbsp Edit Record &nbsp'.'</a>'.
              '<a href='.'delete.php?id='.$row['id'].'>'.'Delete Record'.'</a>'. '</p>'. '<br>';

              //using session cookie to pass the value of the id taken to the next page
              $_SESSION['ide'] = $row['id'];

            }else if(isset($_GET['search'])){
              $searched = $_GET['searched'];
              if($searched == $row['name']){
                echo $row['name'].' was missing from:'. $row['from_period'].' to :'. $row['to_period']. '<br>';
              }                          }
            else if(isset($_GET['add'])){
              header('Location: add.php');
            }
      }
    }
}
else {
  echo 'Error connecting to the DB';
}


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" initial scale="1.0" charset="utf-8">
    <title>Rest Api </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <form action="rest_api.php" method="GET">
         <br><input type="submit" name="list" class="button" value = "List Employees"><br><br>
         <br><input type="submit" name="add" class="button" value = "Add Employees"><br><br>
      <br><label for="search"> Search for results here: <input type="text" name="searched">
             <input type ="submit" name="search" class="button" value="Search Employe">

    </form>
  </body>
</html>
