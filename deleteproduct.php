<?php
	$id=$_GET['id'];
	include('conn.php');
	mysqli_query($conn,"delete from `product` where P_ID='$id'");
	header('location:product.php');
?>