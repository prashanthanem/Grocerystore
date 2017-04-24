<?php
session_start();
$itemid = $_GET['itemID'];
$pid = $_GET['pid'];
require('connect.php');
if (isset($_SESSION['username'])){	
$userID = $_SESSION['userID'];
$noi = "1";
$tcost = "10";
$query = "INSERT INTO cart (userID,noi,itemid,cost) VALUES ('$userID','$noi','$itemid','$tcost')"; 
$result = mysql_query($query);
echo "<script>";
echo "alert('Item added successfully to the cart')";
echo "</script>";
if(!$result)
{
  die('Could not delete data: ' . mysql_error());
}
echo "<script>";
echo "window.location.href='products.php?productID='+$pid";
echo "</script>";
}
else
{
echo "<script>";
echo "window.location='login.php'";
echo "</script>";
}
?>


