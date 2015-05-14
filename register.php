<doctype html>
  <html>
  <head>
    <title>Registration</title>
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
  <body>
    <section id="main" class="container">
    <header>
      <h2>Registration Form</h2>

    </header>

    <div class="row">
      <div class="12u">
        <section class="box">
    <form action="" method="POST">
      Username: <input type="text" name="user"><br />
      Password: <input type="password" name="pass"><br />
      Name: <input type="text" name="name"><br />
      Surname: <input type="text" name="surname"><br />
      Shopname: <input type="text" name="shopname"><br />
      SSID: <input type="text" name="ssid"><br />
      WiFi Password: <input type="text" name="spassword"><br />
      <input type="submit" value="Submit" name="submit"/>

      <?php
      if (isset($_POST["submit"])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $shopname=$_POST['shopname'];
        $ssid=$_POST['ssid'];
        $spassword=$_POST['spassword'];

        $con = mysql_connect('46.101.157.57', 'qrfi', '123456') or die('Could not connect: ' . mysql_error());
        mysql_select_db("QRFI") or die ("Cannot select database");

        $sql = "INSERT INTO REGISTRATION(USERNAME,PASS,NAME,SURNAME,SHOPNAME,SSID,SPASSWORD) VALUES('$user','$pass','$name','$surname','$shopname','$ssid','$spassword')";

        $result = mysql_query($sql);

        if($result){
          //print '<script type="text/javascript">';
          //print 'alert("Account Successfully Registered!")';
          //print '</script>'; 
          $redirectUrl = 'login.php';

          echo '<script type="application/javascript">alert("Account Successfully Registered!"); window.location.href = "'.$redirectUrl.'";</script>'; 
          
          
          //header("Location:login.php");

        } else{
          echo "Failed to register, username already exists, please login!";
        }

        mysql_close($con);
        }



      ?>
    </form>
  </section>
  </body>

  </html>
