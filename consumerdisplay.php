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
table, th, td {
    border: 1px solid black;
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
  left:850px;
  height: 40px;
  background-image: linear-gradient(to right, #0f0c29, #302b63, #24243e);
	}
</style>
</head>
<body>
<a href="farmer.php" target="_self">
	<button class="button" type="button">back</button></a>
<?php
    include('conn.php');
    $F_ID = $_SESSION['F_ID'];


$sql =  "SELECT consumer.C_NAME, buy.B_QTY, product.P_PRICE, buy.B_DATE
         FROM consumer
         INNER JOIN buy ON consumer.C_ID = buy.C_ID
         INNER JOIN product ON buy.P_ID = product.P_ID
         INNER JOIN sell ON product.P_ID = sell.P_ID
         WHERE sell.F_ID = '$F_ID'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
    <tr>
    <th>Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Total Price</th>
    <th>Buy Date</th>
    
    </tr>";
    
    while($row = $result->fetch_assoc()) {
        $B_QTY = $row["B_QTY"];
        $P_PRICE = $row["P_PRICE"];
        settype($B_QTY, "float");
        settype($P_PRICE, "float");
        $total = $B_QTY * $P_PRICE;
        echo "<tr>
        <td>" . $row["C_NAME"]. "</td> 
        <td>" . $row["B_QTY"]. "</td> 
        <td>" . $row["P_PRICE"]. "</td> 
        <td>" . $total. "</td> 
        <td>" . $row["B_DATE"]. "</td> 
        
        
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