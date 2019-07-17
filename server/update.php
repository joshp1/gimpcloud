<?php
  // Post names from index.php
 $aa=$_POST ['claa'];
 $ab=$_POST ['clab'];
 $ac=$_POST ['clac'];
 $ad=$_POST ['clad'];
 $ae=$_POST ['clae'];
 $af=$_POST ['claf'];
 $ag=$_POST ['clag'];

$srv = 'gimpcloud.db.7684787.f67.hostedresource.net';
$unm = 'gimpcloud';
$psw = 'M01!artinfan';
$dbs = 'gimpcloud';

 $con = new mysqli ($srv, $unm, $psw, $dbs);
 if ($con-> connect_error){
	die ("connection failed: " . $con->connect_error);
 }

 $sql="UPDATE color SET theme_color = '".$ab . ','. $ac . ',' . $ad . ','. $ae . ',' . $af . ',' . $ag. "' WHERE theme_name = '".$aa."'";

if ($con->query ($sql) === TRUE) {echo $aa. ' ' . $ab . ' ' . $ac . ' ' . $ad . ' ' . $ae . ' ' . $af . ' ' . $ag;
echo "Update success";
}else{
echo "Eror updating: " . $con->error;
}

$con->close ();
?>
