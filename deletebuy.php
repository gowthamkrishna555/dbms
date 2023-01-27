<?php
	$id=$_GET['id'];
	include('conn.php');
	mysqli_query($conn,"delete from `buy` where P_ID='$id'");
	header('location:buy.php');
?>