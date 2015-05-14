<?php
include('user.php');
?>
<!DOCTYPE html>
<html>
<head>
  <title>QR-FI</title>
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
  <h2 align='center'>Qr Fi</h2>
  <p align='right'>Welcome,<a style= "color: black" href="profile.php"><strong> <?=$username;?>! </strong></a> <a href="logout.php">Logout</a></p>
<?php
  include('create_qrcode.php');

  $mysql = new CreateQRCODE();

echo '<pre>';
echo '<h4 align="center"><strong>Use this qr code</strong></h4>';
$mysql->createQR($username);
echo '</pre>';
?>

<h1 align='center'>Add items to database!</h1>
<section class="box">
<form action="" method="POST">
Category: <br>
<input type="text" name="cat1">
<br>
Product: <br>
<input type="text" name="prod1">
<br>
Price: <br>
<input type="text" name="price1">
<br>
<br>
<input type="submit" value="Submit" name="submit">
</form>
<?php
echo '<p> <a href = "http://83.212.112.221/qrfi/products.php?cmd='. $username .'">Go to my catalogue!</a></p>';
echo '<p> <a href = "http://83.212.112.221/qrfi/prod_edit.php">Edit Products!</a></p>';
?>

<?php
if (isset($_POST["submit"])){
  $category=$_POST['cat1'];
  $product=$_POST['prod1'];
  $price=$_POST['price1'];

  $con = mysql_connect('46.101.157.57', 'qrfi', '123456') or die('Could not connect: ' . mysql_error());
  mysql_select_db("QRFI") or die ("Cannot select database");

  $sql = "INSERT INTO PRODUCTS (PR_ID, USERNAME, CATEGORY, PRODNAME, PRICE) VALUES('','$username','$category','$product','$price')";

  $result = mysql_query($sql);

  if($result){
    echo "Inserted Records Succesfully";
  } else{
    echo "Failed to insert";
  }

  mysql_close($con);
  }

?>
</section>
</body>
</html>
