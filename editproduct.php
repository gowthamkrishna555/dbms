<?php
	include('conn.php');
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from `product` where P_ID='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>PRODUCT</title>
<script>
  function validateForm() {
    var quantity = document.forms["editForm"]["P_QTY"].value;
    var price = document.forms["editForm"]["P_PRICE"].value;
    if (quantity < 0 || price < 0) {
        alert("Quantity and price cannot be negative.");
        return false;
    }
  }
</script>
<style>
body{
    background-image: linear-gradient(to right, #8360c3, #2ebf91);
	}
</style>
</head>
<body>
	<h2>Edit</h2>
	<form method="POST" action="updateproduct.php?id=<?php echo $id; ?>" name="editForm" onsubmit="return validateForm()">
		<label>NAME</label><input type="text" value="<?php echo $row['P_NAME']; ?>" name="P_NAME">
		<label>TYPE</label><input type="text" value="<?php echo $row['P_TYPE']; ?>" name="P_TYPE">
        <label>QUANTITY</label><input type="number" value="<?php echo $row['P_QTY']; ?>" name="P_QTY">
        <label>PRICE</label><input type="number" value="<?php echo $row['P_PRICE']; ?>" name="P_PRICE">
		<input type="submit" name="submit">
		<a href="product.php">Back</a>
	</form>
</body>
<html>