<?php
	include('conn.php');
	$id=$_GET['id'];
 
	$C_NAME=$_POST['C_NAME'];
	$C_ADDRESS=$_POST['C_ADDRESS'];
    $C_CONTACT=$_POST['C_CONTACT'];
	$C_AGE=$_POST['C_AGE'];
 
	mysqli_query($conn,"update `consumer` set  C_ADDRESS='$C_ADDRESS',C_CONTACT='$C_CONTACT',C_AGE='$C_AGE' where C_ID='$id'");
	header('location:consumer.php');
?>