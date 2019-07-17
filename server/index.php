<html>
  <head>
    <title>
Gimp Cloud
    </title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
	function edtclr (aaa)
	{
		$.post ("verification.php",
		{	updtae: aaa
		},function (data, status)
		{	var obj = JSON.parse (data);
			$.each (obj, function (idx, ojb) {
				var clr=ojb.theme_color.split (',');
				console.log (clr [0]);
				$("#cla1").val( clr[0] );
		});

			console.log (data + ' ' + obj.theme_name);
		});

	}
      function clipcolor (clr)
      { alert ("clicked: " + clr);
	console.log ('so far so good');
	$.post ("verification.php",
	{
		delete_id: clr
	},function (data, status)
	{	console.log (data + " posted " + status);
		window.location.reload ();
	});
      }
$(document).ready (function (){
      $("#dltbt").click (function (){
        var del_id = $(this).attr ('id');
        console.log ("this worls at least");
	$.post ("verification.php",
	{
         delete_id: del_id
	},
          function (data, status)
          {
            console.log ("Click");
          });
      });});
      </script>
      <style>
        #clrbx
        {
          Border: 1px solid black;
          display: inline_block;
          float: left;
        }
	#dltbt
	{
		display: inline_block;
		float:right;
	}
      </style>
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

      $sql = "SELECT * FROM color WHERE UID = '".$UserID. "' ORDER BY id";
      $res=$cnnn->query ($sql);

      if ($res->num_rows >0){
      while ($row=$res->fetch_assoc ()) {
        $rwo = explode (",", $row [theme_color]);
        $cnt=count ($rwo);
        echo "<div id='clrbx'>";
        echo "<div class='dltbt' onclick=".'"'."clipcolor ('".$row ['theme_name']. "');".'"'.">X</div>";
	echo "<div class='edt' onclick=".'"'."edtclr ('" . $row ['theme_name'] . "');".'"'."><u>E</u></div>";
        echo "<svg width='420'>";
        for ($x = 0;$x<$cnt; $x++){
          $y=$x*65;
          $yy=$x*70;
          //echo "<span>".$rwo [$x]."</span>\n<span style='width:10px; height:10px;background-color:".$rwo [$x].";'></span>\n";
          echo "<g>";

          echo "<text class='txt' font-size='55' x='175' y='50'>". $row ['theme_name'] . "</text>";
          echo "<rect width='75' height='75' x='".$y."' y='60' style='fill:". $rwo [$x]. "' onclick = 'ab".$x."'id='ab".$x."' />\n";
          echo "<text fill='black' x='".$yy."' y='150'>".$rwo [$x]."</text>";
          echo "</g>";
        }
       echo "</svg><br />\n<a href='verification.php'> not sure</a></div>";
     }
    } else {
      print "Nothing in database. You need to add stuff first";
    }
    $cnnn->close ();?>

    <div id="aa01">
      <!-- New themea area needs to be a popup layer -->
      <form action = "color.php" method = "post">
        Theme name:
        <input type="text" name='clrN' /> <br />
        color 1:
        <input type="text" name="clr1" /><br />
        color 2:
        <input type="text" name="clr2" /><br />
        color 3:
        <input type="text" name = "clr3" /><br />
        color 4:
        <input type="text" name="clr4" /><br />
        color 5:
        <input type="text" name ="clr5" /><br />
        color 6:
        <input type="text" name="clr6" /><br />
        <input type="submit" value="Submit" />
      </form>
    </div>
	<div id="aa01">
	 <!-- update form needs to be hidden -->
	<form action="update.php" method = "post">
		Theme name:
		<input type="text" name = 'claa' /><br />
	color 1:<input type="text" name = 'clab' id="cla1" /><br />
	color 2:<input type="text" name = 'clac' id="cla2" /><br />
	color 3:<input type="text" name = 'clad' id="cla3" /><br />
	color 4:<input type="text" name = 'clae' id="cla4" /><br />
	color 5:<input type="text" name = 'claf' id="cla5" /><br />
	color 6:<input type="text" name = 'clag' id="cla6" /><br />
			<input type="submit" value = 'Submit' />
	</form>
	</div>
<?  } else {
    ?>
    <form action='verification.php' method = 'post'>
      <input type='text' name='un1' value="inter username" />
      <input type='password' name ='ps1' />
      <input type='submit' value = "Submit" />
    </form>
      <?}?>
  </body>
</html>
