<?php
$connection = mysqli_connect('gimpcloud.db.7684787.f67.hostedresource.net', 'gimpcloud', 'M01!artinfan');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'mashlog_demo');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
if (isset($_POST['user_id']) and isset($_POST['user_pass'])){

// Assigning POST values to variables.
$username = $_POST['un1'];
$password = $_POST['ps1'];

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `user_login` WHERE username='$username' and Password='$password'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count == 1){

}else{
}
}
?>
