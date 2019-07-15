<?php
$connection = mysqli_connect('gimpcloud.db.7684787.f67.hostedresource.net', 'gimpcloud', 'M01!artinfan');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'gimpcloud');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

     // UserID cookcie
    $UID= $_COOKIE ['UsrID'];
   // Assigning POST values to variables.
  $clrN= $_POST ['clrN'];
 $clr1 = $_POST['clr1'];
 $clr2 = $_POST['clr2'];
 $clr3 = $_POST ['clr3'];
 $clr4 = $_POST ['clr4'];
 $clr5 = $_POST['clr5'];
 $clr6 = $_POST['clr6'];

 // query to add data into database
    $query = "INSERT INTO color (UID, theme_name, theme_color) VALUES ('".$UID.", ".$clrN.", '". $clr1.",".$clr2.",".$clr3.",".$clr4.",".$clr5.",".$clr6."')";
    if (mysqli_query ($connection, $query)) {
      echo "Success I guess";
    } else {
      echo "Eror: ". $sql. "<br />". $connection->error. " " .$query;
    }

$connection->close ();?>
