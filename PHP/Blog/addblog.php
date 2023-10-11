<?php
include("connect.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
if (isset($_GET['lg'])) {
    unset($_SESSION['username']);
    header("location: login.php");
}
if (isset($_POST['btnsubmit'])) {
    $createat = date('Y-m-d');
    $blogtitle = $_POST['txtblogtitle'];
    $blogdetail = $_POST['txtblogdetail'];
    $userid = $_SESSION['userid'];
    $insert = "insert into tbl_blog values(0,'$blogtitle','$blogdetail','$createat',$userid,1)";
    if (mysqli_query($connect, $insert)) {
        echo "Success : Blog is added successfully";
    } else {
        echo "Error :" . mysqli_error($connect);
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
        <h1>Welcome
            <?php echo $_SESSION['username']; ?> | <a href="myhome.php?lg=1">Logout</a>
        </h1>
        <a href="myhome.php">View Blogs</a>
        <h2>Add Blog</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Blog Title</td>
                    <td><input type="text" name="txtblogtitle" /></td>
                </tr>
                <tr>
                    <td>Blog Detail</td>
                    <td><textarea cols="20" rows="3" name="txtblogdetail"></textarea></td>
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