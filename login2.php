<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login2.css">
</head>
<body>
<div class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <p>Username</p>
            <input type="text" id="username" name="C_ID" placeholder="Enter the username">
            <p>Password</p>
            <input type="password" name="password" id="password" placeholder="Enter the password">
            <input type="submit" value="login">
            <a href="register1.php">create new account?</a>
        </form>

        
    </div>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="agriculture1";

$conn = new mysqli($servername, $username, $password,$db_name);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['password'])){

$C_ID = $_POST["C_ID"];
$password = $_POST["password"];


$sql = "SELECT * FROM consumer WHERE C_ID='$C_ID' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    $_SESSION["logged_in"] = true;
    $_SESSION["C_ID"] = $C_ID;
   

    header("Location: consumer.php");
} else {
    
    echo
             "
             <script>
               alert('Invalid Username or Password');
             </script>
             ";
}
$conn->close();
}
?>
</body>
</html>