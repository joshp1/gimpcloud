<?php
$host="gimpcloud.db.7684787.f67.hostedresource.net";
$mysqli = new mysqli($host, "gimpcloud", "M01!artinfan", "gimpcloud");

if ($mysqli->connect_error) {
  die ("connection failed :" . $con-> connect_error);
}

$sqls="SELECT id, theme, image from test";
if (!$resl=$mysqli->query ($sqls))
  {
    echo "Nothing saved to it. Please make a theme\n";
    print "<table border=0>\n\t<form action='validate.php' method = 'post'>\n\t\t
<tr>\n\t\t<td>Theme Name: </td><td><input type='text' name='tName' /></td>\n\t</tr>\n\t<tr>\n\t\t
<td>Hexidecimal color: </td>\n\t\t<td>\n\t\t\t<input type ='text' name='Hexcolor' />\n\t\t</td>\n\t</tr>\n\t<tr>
<td></td><td><input type='submit' value='_Submit' />";

  } else {
  if ($resl->num_rows > 0){
    While ($row=$resl->fetch_assoc ()) {
      echo "id: " . $row['id']. " - Name :". $row['theme']. " " . $row[ 'image' ]. "<br />";
    }
  } else{
    echo "o results";
}
$conn->close ();
}
?>