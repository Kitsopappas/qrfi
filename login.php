<!doctype html>
<html>
<head>
  <title>Log In!</title>
  <link rel="icon" type="image/icon" href="http://83.212.112.221/qrfi/favicon.ico">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.dropotron.min.js"></script>
  <script src="js/jquery.scrollgress.min.js"></script>
  <script src="js/skel.min.js"></script>
  <script src="js/skel-layers.min.js"></script>
  <script src="js/init.js"></script>
  <noscript>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-wide.css" />
  </noscript>
  <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body >
  <section id="main" class="container">
  <header>
    <h2>Login Form</h2>
    <h4>Login to your account.</h4>
  </header>

  <div class="row">
    <div class="12u">
      <section class="box">

  <form action="" method="POST">

        <h5>Username: </h5><input type="text" name="user"><br />


      <h5>Password: </h5><input type="password" name="pass"><br />

    <input type="submit" value="Submit" name="submit"/>
</div>
</div>
</section>

<?php
if (isset($_POST["submit"])){
  $user=$_POST['user'];
  $pass=$_POST['pass'];

  $con = mysql_connect('46.101.157.57', 'qrfi', '123456') or die('Could not connect: ' . mysql_error());
  mysql_select_db("QRFI") or die ("Cannot select database");

  $query = mysql_query("SELECT * FROM REGISTRATION WHERE USERNAME = '".$user."' AND PASS ='".$pass."'");
  $numrows = mysql_num_rows($query);

  if($numrows!=0){
    while($row=mysql_fetch_assoc($query)){
      $dbusername = $row['USERNAME'];
      $dbpassword = $row['PASS'];
    }

    if($user == $dbusername && $pass == $dbpassword){
      echo "Username and Password correct!";
      session_start();
      $_SESSION['sess_user'] = $user;
      //Redirect
      header("Location: profile.php");
    }
  } else{
    echo "Incorrect username or password!";
  }
  mysql_close($con);
}
?>
</body>
</html>
