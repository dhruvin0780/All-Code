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
    $bid = $_GET['bid'];
    $update = "update tbl_blog set blog_title='$_POST[txtblogtitle]',blog_detail='$_POST[txtblogdetail]' where blog_id=$bid";
    if (mysqli_query($connect, $update))
        echo "Success: Data Updated";
    else {
        echo "Error:" . mysqli_error($connect);
    }
}

if (isset($_GET['bid'])) {
    $sel = "select * from tbl_blog where blog_id=$_GET[bid]";
    $res = mysqli_query($connect, $sel);
    $data = mysqli_fetch_row($res);
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
        <h2>Update Blog</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Blog Title</td>
                    <td><input type="text" name="txtblogtitle" value="<?php echo $data[1]; ?>" /></td>
                </tr>
                <tr>
                    <td>Blog Detail</td>
                    <td><textarea cols="20" rows="3" name="txtblogdetail"><?php echo $data[2]; ?></textarea></td>
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