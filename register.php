<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <?php

    include('conn.php');
    if (isset($_REQUEST['password'])) {
        $sql = "SELECT F_ID FROM farmer where F_ID='" . $_REQUEST['F_ID'] . "'";
        $res = $conn->query($sql);

        if ($res->num_rows == 1) {
            echo "<script>alert('User already exist');</script>";
           
        } else {

            if ($_REQUEST['F_ID'] != "" || $_REQUEST['password'] != "") {
                $F_ID = $_REQUEST['F_ID'];
                $password = $_REQUEST['password'];
                $password2 = $_REQUEST['password2'];
                $F_NAME = $_REQUEST['F_NAME'];
                $F_CONTACT = $_REQUEST['F_CONTACT'];
                $F_AGE = $_REQUEST['F_AGE'];
                if($F_AGE < 0){
                    echo "<script>alert('Age cannot be negative account not created');</script>";
                }
                else if($F_CONTACT < 0){
                    echo "<script>alert('Contact number cannot be negative account not created');</script>";
                }
                else if(strlen($F_CONTACT) != 10){
                    echo "<script>alert('Contact number should be exactly 10 digits');</script>";
                }
                else if(!preg_match("/^[a-zA-Z ]*$/",$F_NAME)){
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
                $sql = "INSERT INTO `farmer` ( `F_ID`, `password`,`F_NAME`,`F_CONTACT`,`F_AGE`) VALUES  ('$F_ID','$password',' $F_NAME',' $F_CONTACT ','$F_AGE')";
                $conn->query($sql);
                echo "<script>alert('Account created');</script>";
                }
            } else {
                echo 
                "<script>alert('Fill the form');</script>";
            }
        }
    }
    ?>
    <div class="container">
        <h1>Create account</h1>
        <form action="" method="post">
            <p>Username</p>
            <input class="text-box" type="text" name="F_ID" id="F_ID" placeholder="Enter your UserID">
            <p>Password</p>
            <input  class="password" type="password" name="password" id="password" placeholder="Enter the password">
            <p>Retype-password</p>
            <input  class="password2" type="password" name="password2" id="password2" placeholder="Enter the password">
            <p>Name</p>
            <input class="text-box" type="text" name="F_NAME" id="F_NAME" placeholder="Enter your name">
            <p>Contact</p>
            <input class="text-box" type="text" name="F_CONTACT" id="F_CONTACT" placeholder="Enter your contact">
            <p>Age</p>
            <input class="text-box" type="text" name="F_AGE" id="F_AGE" placeholder="Enter your age">
            
            <input type="submit" name="button" id="show-modal" action="trigger.php" value="Create account" >


        </form>
        <a href="login.php">back</a>


    </div>

</body>

</html>