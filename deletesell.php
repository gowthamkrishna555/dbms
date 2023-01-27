<?php
	$id=$_GET['id'];
	include('conn.php');
	mysqli_query($conn,"delete from `sell` where F_ID='$id'");
	header('location:sell.php');
?>
