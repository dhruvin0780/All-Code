<?php
session_start();
include("./connection.php");

if (!isset($_GET["blog"])) {
    header("location:./viewPerumes.php");
}

$id = $_GET["blog"];
$query = "delete from tbl_blog where Id = $id";
$result = mysqli_query($conn, $query);
if (mysqli_query($conn, $query)) {
    echo "<script type='text/javascript'>
            alert('blog Delete Successfully');
        </script>";
    header("location:./viewBlog.php");
}

?>