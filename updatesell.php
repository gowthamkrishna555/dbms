<?php
	include('conn.php');
	$id=$_GET['id'];
 
	$F_ID=$_POST['F_ID'];
	$P_ID=$_POST['P_ID'];
    
	$S_DATE=$_POST['S_DATE'];
 
	mysqli_query($conn,"update `sell` set F_ID='$F_ID', P_ID='$P_ID',S_DATE='$S_DATE' where F_ID='$id'");
	header('location:sell.php');
?>