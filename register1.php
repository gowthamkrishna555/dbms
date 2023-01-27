<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register1.css">
</head>

<body>
    <?php

    include('conn.php');
    if (isset($_REQUEST['password'])) {
        $sql = "SELECT C_ID FROM consumer where C_ID='" . $_REQUEST['C_ID'] . "'";
        $res = $conn->query($sql);

        if ($res->num_rows == 1) {
            echo "<script>alert('User already exist');</script>";
        } else {

            if ($_REQUEST['C_ID'] != "" || $_REQUEST['password'] != "") {
                $C_ID = $_REQUEST['C_ID'];
                $password = $_REQUEST['password'];
                $password2 = $_REQUEST['password2'];
                $C_NAME = $_REQUEST['C_NAME'];
                $C_CONTACT = $_REQUEST['C_CONTACT'];
                $C_AGE = $_REQUEST['C_AGE'];
                if($C_AGE < 0){
                    echo "<script>alert('Age cannot be negative account not created');</script>";
                }
                else if($C_CONTACT < 0){
                    echo "<script>alert('Contact number cannot be negative account not created');</script>";
                }
                else if(strlen($C_CONTACT) != 10){
                    echo "<script>alert('Contact number should be exactly 10 digits');</script>";
                }
                else if(!preg_match("/^[a-zA-Z ]*$/",$C_NAME)){
                echo "<script>alert('Name can be only text');</script>";
                }
                else if(strlen($password) < 8){
                    echo "<script>alert('Password must be at least 8 characters long');</script>";
                }
                else if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)){
                    echo "<script>alert('Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character');</script>";
                }
                else if($password != $password2){
                    echo "<script>alert('Password does not match');</script>";
                }
                else{
                $sql = "INSERT INTO `consumer` ( `C_ID`, `password`,`C_NAME`,`C_CONTACT`,`C_AGE`) VALUES  ('$C_ID','$password',' $C_NAME',' $C_CONTACT ','$C_AGE')";
                $conn->query($sql);
                echo "<script>alert('Account created');</script>";
                    }
        
             }else {
                echo "<script>alert('Fill the form');</script>";
            }
        }
    }
    ?>
    <div class="container">
        <h1>Create account</h1>
        <form action="" method="post">
            <p>Username</p>
            <input class="text-box" type="text" name="C_ID" id="name" placeholder="Enter your username">
            <p>Password</p>
            <input class="password" input type="password" name="password" id="password" placeholder="Enter the password">
            <p>Retype-password</p>
            <input  class="password2" input type="password" name="password2" id="password2" placeholder="Enter the password">
            <p>Name</p>
            <input class="text-box" type="text" name="C_NAME" id="C_NAME" placeholder="Enter your name">
            <p>Contact</p>
            <input class="text-box" type="text" name="C_CONTACT" id="C_CONTACT" placeholder="Enter your contact">
            <p>Age</p>
            <input class="text-box" type="text" name="C_AGE" id="C_AGE" placeholder="Enter your age">
            
            <input type="submit" name="button" value="Create account" action="trigger.php"   >

        </form>
        <a href="login2.php">back</a>


    </div>

</body>

</html>