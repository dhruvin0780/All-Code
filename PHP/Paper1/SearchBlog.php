<?php
session_start();
include("./connection.php");
if (!isset($_SESSION["loggedin"])) {
    header("location:./login.php");
    exit();
}

$query = "select * from tbl_blog";
$result = mysqli_query($conn, $query);
$srno = 1;
while ($row = mysqli_fetch_assoc($result)) {
    // print_r($row);
    // echo "<pre>";
    ?>
    <tr>
        <td>
            <?php echo "$srno"; ?>
        </td>
        <td>
            <img src="image/ <?php echo $row['image']; ?>" alt="" height="100px" width="100px">
        </td>
        <td>
            <?php echo $row['title']; ?>
        </td>
        <td>
            <?php echo $row['bio']; ?>
        </td>
        <?php
        if ($_SESSION["role"] == "ADMIN") {
            ?>

            <td>
                <?php echo "<a href='updateblog.php?blog=" . $row["Id"] . "'>Update</a>"; ?>
            </td>
            <td>
                <?php echo "<a href='deleteblog.php?blog=" . $row["Id"] . "'>Delete</a>"; ?>
            </td>
            <?php
        }
        $srno++;
        ?>
    </tr>
    <?php
}
?>