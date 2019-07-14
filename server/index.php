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

      $cnnn = new mysqli ($servn, $uname, $pasw, $dbn);
      if ($cnnn-> connect_error){
        die ("Conection faild: " . $cnnn->connect_error);
      }

      $sql = "SELECT * FROM color WHERE UID = $UserID ORDER BY ID";
      $res=$cnnn->query ($sql);

      $res->num_rows >0){
      while ($row=$res->fetch_assoc ()) {
        echo $row ['theme_name'] . '<br />' . $row [theme_color];
      } echo "<a"
    } else {
      print "Nothing in database. You need to add stuff first";
    }
    $cnnn->close ();
    ?>
    <form action='verification.php' method = 'post'>
      <input type='text' name='un1' value="inter username" />
      <input type='password' name ='ps1' />
      <input type='submit' value = "Submit" />
      <?}?>
    </form>
  </body>
</html>
