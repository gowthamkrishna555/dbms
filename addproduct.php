<?php
session_start();
?>
<?php
	include('conn.php');


	$P_ID=$_POST['P_ID'];
	$P_NAME=$_POST['P_NAME'];
    $P_TYPE=$_POST['P_TYPE'];
    $P_QTY=$_POST['P_QTY'];
    $P_PRICE=$_POST['P_PRICE'];

 
	$sql = "SELECT * FROM product WHERE P_ID='$P_ID'";
    $result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    echo "<script>alert('Product ID already taken, please choose a new one.');</script>";
    header("refresh:0; url=product.php");
} 
else {
    mysqli_query($conn,"insert into `product` (P_ID,P_NAME,P_TYPE,P_QTY,P_PRICE) values ('$P_ID','$P_NAME','$P_TYPE','$P_QTY',' $P_PRICE')");
    $_SESSION["P_ID"] = $P_ID;
    header("Location: product.php");
}

?>
   