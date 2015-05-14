<?php
include('user.php');
class CreateQRCODE{

public function createQR($username){
$link = mysql_connect("46.101.157.57", "redone", "7Zdd31s0");

$SQLSSID = "SELECT SSID FROM REGISTRATION WHERE USERNAME = '". $username."'";
$SQLPASS = "SELECT SPASSWORD FROM REGISTRATION WHERE USERNAME = '". $username."'";

mysql_select_db('QRFI');
$retval = mysql_query( $SQLSSID, $link );
if(! $retval )
{
die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
  //echo $row['SSID'];
  $ssid = $row['SSID'];
}
$retval2 = mysql_query( $SQLPASS, $link );
if(! $retval2 )
{
die('Could not get data: ' . mysql_error());
}
while($row2 = mysql_fetch_array($retval2, MYSQL_ASSOC))
{
  //echo $row2['SPASSWORD'];
  $pass = $row2['SPASSWORD'];
}
mysql_close($link);
echo '<div align="middle">';
echo '<img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl='. '<u>'.$username.'</u>' .'<s>' . $ssid .'</s>'.'<p>' . $pass .'</p>'. '&choe=UTF-8" title="Link to Google.com"/>';
echo '</div>';
  }
}
?>
