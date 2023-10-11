<?php
include("connect.php");
if (isset($_POST['btnsubmit'])) {
    $fname = $_POST['txtfname'];
    $lname = $_POST['txtlname'];
    $address = $_POST['txtaddress'];
    $mobileno = $_POST['txtmobileno'];
    $email = $_POST['txtemail'];
    $password = $_POST['txtpassword'];
    $select = "select user_id from tbl_user where emailid='$email'";
    $result = mysqli_query($connect, $select);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "Error: Email-id is already registered";
    } else {
        $insert = "insert into tbl_user values(0,'$fname','$lname','$address',$mobileno,'$email','$password')";
        if (mysqli_query($connect, $insert))
            echo "Success: Record inserted successfully";
        else {
            echo "Fail" or die(mysqli_error($connect));
        }

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
        <h2>Registration form</h2>
        <form method="post">
            <table>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="txtfname" /></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="txtlname" /></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><textarea cols="20" rows="3" name="txtaddress"></textarea></td>
                </tr>
                <tr>
                    <td>Mobile No</td>
                    <td><input type="text" name="txtmobileno" /></td>
                </tr>
                <tr>
                    <td>Email-id</td>
                    <td><input type="email" name="txtemail" /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="txtpassword" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btnsubmit" value="Submit" /></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>