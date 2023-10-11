<?php
session_start();
include("./connection.php");
if (!isset($_SESSION["loggedin"])) {
  header("location:./login.php");
  exit();
}

$query = "select * from tbl_perfumes";
$result = mysqli_query($conn, $query);
$srno = 1;
while ($row = mysqli_fetch_assoc($result)) {
  ?>
  <tr>
    <td>
      <?php echo "$srno"; ?>
    </td>
    <td>
      <?php echo $row['name']; ?>
    </td>
    <td>
      <?php echo $row['type']; ?>
    </td>
    <td>
      <?php echo $row['price']; ?>
    </td>
    <?php
    if ($_SESSION["role"] == "ADMIN") {
      ?>

      <td>
        <?php echo "<a href='updatePerfume.php?perfume=" . $row["pid"] . "'>Update</a>"; ?>
      </td>
      <td>
        <?php echo "<a href='deletePerfume.php?perfume=" . $row["pid"] . "'>Delete</a>"; ?>
      </td>
      <?php
    }
    ?>
  </tr>
  <?php
}
?>