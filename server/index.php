<html>
  <head>
    <title>
Gimp Cloud
    </title>
  </head>
  <body><?php
    print 'Color themes';
    if ($_COOKIE ['loginfo'])
    {
      print "loged N";
      $UserID= $_COOKIE ['UsrID'];

      $servn = 'gimpcloud.db.7684787.f67.hostedresource.net';
      $uname = 'gimpcloud';
      $pasw = 'M01!artinfan';
      $dbn = 'gimpcloud';

      $cnnn = new mysqli ($servn, $uname, $pasw, $dbn);
      if ($cnnn-> connect_error){
        die ("Conection faild: " . $cnnn->connect_error);
      }

      $sql = "SELECT * FROM color WHERE UID = $UserID ORDER BY ID";
      $res=$cnnn->query ($sql);

      if ($res->num_rows >0){
      while ($row=$res->fetch_assoc ()) {
        $rwo = explode (",", $row [theme_color]);
        print count ($rwo ['theme_color']);
        echo $row ['theme_name'] . '<br />' . $row ['theme_color'];
       echo "<a href='verification.php'>";
     }
    } else {
      print "Nothing in database. You need to add stuff first";
    }
    $cnnn->close ();
  } else {
    ?>
    <form action='verification.php' method = 'post'>
      <input type='text' name='un1' value="inter username" />
      <input type='password' name ='ps1' />
      <input type='submit' value = "Submit" />
      <?}?>
    </form>
  </body>
</html>
