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
if (isset($_GET['delid'])) {
    $delete = "delete from tbl_blog where blog_id=$_GET[delid]";
    mysqli_query($connect, $delete);
}

if (isset($_GET['bid'])) {
    if ($_GET['act'] == 1)
        $update = "update tbl_blog set status=0 where blog_id=$_GET[bid]";
    else
        $update = "update tbl_blog set status=1 where blog_id=$_GET[bid]";
    mysqli_query($connect, $update);
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
        <a href="addblog.php">Add Blog</a>
        <h2>My Blogs</h2>
        <table border="1">
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Detail</th>
                <th>Date</th>
                <th>Status</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
            $i = 1;
            $select = "select * from tbl_blog where user_id=$_SESSION[userid] order by blog_id desc";
            $result = mysqli_query($connect, $select);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $i; ?>
                    </td>
                    <td>
                        <?php echo $row[1]; ?>
                    </td>
                    <td>
                        <?php echo $row[2]; ?>
                    </td>
                    <td>
                        <?php echo $row[3]; ?>
                    </td>
                    <td>
                        <?php if ($row[5] == 1)
                            echo "<a href='myhome.php?bid=$row[0]&act=$row[5]'>Enable</a>";
                        else
                            echo "<a href='myhome.php?bid=$row[0]&act=$row[5]'>Disable</a>"; ?>
                    </td>
                    <td>
                        <a href="updateblog.php?bid=<?php echo $row[0]; ?>">Update</a>
                    </td>
                    <td>
                        <a href="myhome.php?delid=<?php echo $row[0]; ?>"
                            onclick="return confirm('Are you sure to delete?')">Delete</a>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
        </table>
    </center>
</body>

</html>