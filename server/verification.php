<?php
$connection = mysqli_connect('gimpcloud.db.7684787.f67.hostedresource.net', 'gimpcloud', 'M01!artinfan');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'gimpcloud');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
if (isset($_POST['un1']) and isset($_POST['ps1'])){

    // Assigning POST values to variables.
   $username = $_POST['un1'];
   $password = $_POST['ps1'];

    // CHECK FOR THE RECORD FROM TABLE
   $query = "SELECT * FROM `Main` WHERE username='$username' and Password='$password'";

   $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
   $count = mysqli_num_rows($result);
   if ($_COOKIE ['loginfo']){
     while ($row=$result->fetch_assoc ()) {
       setcookie ('loginfo', '', time () - 3600);
       setcookie ('UsrID', $row ['UID']);

       header ($_SERVER ['HTTP_REFERER']);
     }
   } else {
     if ($count == 1){
       $value= 'logged';
       setcookie ('loginfo', $value);
       header ($_SERVER ['HTTP_REFERER']);echo $row
     }else{echo "I guess not logeded in";
  }
} }

$id = $_POST ['delete_id'];

if ($id){
  $UID=$_COOKIE ['UsrID'];
  $sql->query ('DELETE FROM color WHERE UID = ' . $UID);
  mysqli_query ($connection, $sql);
setcookie ('testre', $id);}
?>
