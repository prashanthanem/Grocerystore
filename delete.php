<?php
session_start();
$itemID = $_GET['itemid'];
require('connect.php');
if (isset($_SESSION['username'])){
$userID = $_SESSION['userID'];
$query = "DELETE  FROM `cart` WHERE itemid='$itemID'";
$result = mysql_query($query);
if(! $result )
{
  die('Could not delete data: ' . mysql_error());
}
echo "<script>";
echo "window.location='cart.php'";
echo "</script>";
}
?>


