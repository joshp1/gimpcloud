<html>
  <head>
    <title>
Gimp Cloud
    </title>
  </head>
  <body><?php
    Color themes
    if ($_COOKIE ['loginfo'])
    {
    print "loged N";
    }else{?>
    <form action='verification.php' method = 'post'>
      <input type='text' name='un1' value="inter username" />
      <input type='password' name ='ps1' />
      <input type='submit' value = "Submit" />
      <?>?>
    </form>
  </body>
</html>
