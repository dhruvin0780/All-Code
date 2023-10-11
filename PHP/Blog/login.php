<?php
include("connect.php");
session_start();
if (isset($_SESSION['username'])) {
    header("location:myhome.php");
}
if (isset($_POST['btnsubmit'])) {
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];
    $select = "select * from tbl_user where emailid='$email' and password='$password'";
    $result = mysqli_query($connect, $select);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $row = mysqli_fetch_row($result);
        $_SESSION['username'] = $email;
        $_SESSION['userid'] = $row[0];
        header("location:myhome.php");
    } else {
        echo "Error: Either Email or Password Wrong";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <h1>-- Blog Site --</h1>
        <a href="login.php">Login</a> | <a href="index.php">Registration</a>
        <h2>Login form</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="txtemail" required /></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="txtpassword" required /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnsubmit" value="Submit" /></td>
                </tr>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>