<?php
	include('conn.php');
	$id=$_GET['id'];
 
	$P_ID=$_POST['P_ID'];
	
    $B_QTY=$_POST['B_QTY'];
	$B_DATE=$_POST['B_DATE'];
  
	$sql = "SELECT P_PRICE FROM product WHERE P_ID='$P_ID'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    $P_PRICE = $row['P_PRICE'];
    $total_price = $P_PRICE*$B_QTY;

	mysqli_query($conn,"update `buy` set  B_QTY='$B_QTY',B_DATE='$B_DATE' where P_ID='$id'");
	header('location:buy.php');
	?>