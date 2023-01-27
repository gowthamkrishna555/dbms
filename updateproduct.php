<?php
	include('conn.php');
	$id=$_GET['id'];
 
	$P_NAME=$_POST['P_NAME'];
	$P_TYPE=$_POST['P_TYPE'];
    $P_QTY=$_POST['P_QTY'];
	$P_PRICE=$_POST['P_PRICE'];
 
	mysqli_query($conn,"update `product` set P_NAME='$P_NAME', P_TYPE='$P_TYPE',P_QTY='$P_QTY',P_PRICE='$P_PRICE' where P_ID='$id'");
	header('location:product.php');
?>