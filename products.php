<!DOCTYPE html>
<html>
<head>
  <title>Products</title>
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


  <?php
  class Products{

    public function viewProducts($username){

      echo '<h2 align="center">Qr Fi</h2>';
      $link = mysql_connect("46.101.157.57", "redone", "7Zdd31s0");
      $category_num = "SELECT CATEGORY FROM PRODUCTS WHERE USERNAME = '". $username."' GROUP BY CATEGORY";


      mysql_select_db('QRFI');
      $cat = mysql_query($category_num, $link);

      if(! $cat)
      {
        die('Could not get data: ' . mysql_error());

      }
      echo '<section class="box">';

      while($r= mysql_fetch_array($cat, MYSQL_ASSOC)){
        echo '<h2>'.$r['CATEGORY'].'</h2>';
        $CATEG = $r['CATEGORY'];
        $product = "SELECT CATEGORY, PRODNAME, PRICE FROM PRODUCTS WHERE USERNAME = '". $username."' && CATEGORY = '".$CATEG." '";
        $retval = mysql_query( $product, $link );
        echo '<div class="table-wrapper">
          <table>
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
              </tr>
            </thead>';
        if(! $retval )
        {
          die('Could not get data: ' . mysql_error());
        }
        while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
        {       echo '<tbody>';
                echo '<tr>
                  <td>'.$row['PRODNAME'].'</td>
                  <td>'.$row['PRICE'].'</td>
                </tr>';

                echo '</tbody>';



         }
         echo '</table>';
         echo '</div>';
      }



      mysql_close($link);
      }
    }

    $prod = new Products();
    $prod -> viewProducts($_GET['cmd']);


  ?>
</section>
</body>
</html>
