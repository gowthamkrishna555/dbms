<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<style>
    body{
        background-image: linear-gradient(to right, #8360c3, #2ebf91);
    }
    td{
		background-color:white;
		width: 200px;
		height:30px;
	}
	th{
		background-color:;
		width:200px;
		height:30px;
    }
table, th, td {
    border: 1px solid black;
}
.button{
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  position:relative;
  top:400px;
  left:550px;
  height: 40px;
  background-image: linear-gradient(to right, #0f0c29, #302b63, #24243e);
	}
</style>
</head>
<body>
<a href="buy.php" target="_self">
	<button class="button" type=button>BUY</button></a>
<?php
    include('conn.php');


$sql = "SELECT  farmer.F_CONTACT,farmer.F_NAME,product.P_ID,product.P_NAME,product.P_TYPE,product.P_QTY,product.P_PRICE
FROM farmer,product,sell
WHERE sell.P_ID=product.P_ID AND farmer.F_ID=sell.F_ID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
    <tr>
    <th>ID</th> 
    <th>Name</th>
    <th>Product Type</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Farmer Name</th>
    <th>Contact</th>
    
    </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["P_ID"]. "</td> 
        <td>" . $row["P_NAME"]. "</td> 
        <td>" . $row["P_TYPE"]. "</td> 
        <td>" . $row["P_QTY"]. "</td> 
        <td>" . $row["P_PRICE"]. "</td> 
        <td>" . $row["F_NAME"]. "</td> 
        <td>" . $row["F_CONTACT"]. "</td> 
        
        </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?> 

</body>
</html>