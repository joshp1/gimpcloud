<html>
  <head>
    <title>
Gimp Cloud
    </title>
    <script>
      function clipcolor (clr)
      { clr.select ();
        alert ("clicked: " + clr);
        document.execCommand('copy');
      }
      </script>
  </head>
  <body><?php
    print "\nColor themes \n<br />\n";
    if ($_COOKIE ['loginfo'])
    {
      print "loged N\n<br />\n";
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
        $cnt=count ($rwo);
        print "\n Theme color count: ". $cnt. " \n <br />";
        echo "<h1>". $row ['theme_name']. "</h1>";
        echo "<svg>";
        for ($x = 0;$x<$cnt; $x++){
          $y=$x*50;
          //echo "<span>".$rwo [$x]."</span>\n<span style='width:10px; height:10px;background-color:".$rwo [$x].";'></span>\n";
          echo "<rect width='50' height='50' x='".$y."' y='10' style='fill:". $rwo [$x]. "' onclick='clipcolor (".'"'.$rwo [$x].'"'.")'/>\n";
        }
       echo "</svg><br />\n<a href='verification.php'>";
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
    </form>
      <?}?>
  </body>
</html>
