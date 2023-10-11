<?php
$connect = mysqli_connect("localhost", "root", "", "db_blog");
if (!$connect)
    echo "Can not connect to database" or die(mysqli_connect_error());
?>