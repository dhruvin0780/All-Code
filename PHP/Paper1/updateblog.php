<?php
session_start();
include("./connection.php");

// if (!isset($_GET["blog"])) {
//     header("location:./viewBlog.php");
// }

$id = $_GET["blog"];
$query = "select * from `tbl_blog` where Id = $id";
$result = mysqli_query($conn, $query);
// if (!$result) {
//     header("location:./viewBlog.php");
// }
$row = mysqli_fetch_assoc($result);
$title = $row["title"];
$bio = $row["bio"];

// $name = $row["name"];
// $type = $row["type"];
// $price = $row["price"];
// $nameErr = "";
// $typeErr = "";
// $priceErr = "";
$result = false;

if (isset($_POST["update"])) {
    echo "id is hear";
    $title = $_POST["title"];
    $bio = $_POST["bio"];

    $image = $_FILES["image"]["name"];
    $tem_name = $_FILES["image"]["tmp_name"];
    $path = "./image/ " . $image;
    move_uploaded_file($tem_name, $path);

    if (isset($id)) {
        echo "id is set in url";
        $query = "UPDATE `tbl_blog` set `title` ='$title',`bio`='$bio' where `Id` = '$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "            <script type='text/javascript'>
                alert('Perfume Updated Successfully');
            </script>";

        }
    } else {
        echo "id is not set in url";
        $query = "INSERT INTO `tbl_blog`(`image`,`title`,`bio`) VALUES('$image','$title','$bio')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "            <script type='text/javascript'>
                alert('Perfume Add Successfully');
            </script>";

        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Add Perfumes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    </head>

    <body>
        <header class="bg-primary text-center p-3 text-light">
            <p class="display-1">Perfume Blogs</p>
        </header>
        <?php
        include("navbar.php");
        ?>
        <main class="p-5 container">
            <section class="jumbotron p-4">
                <form action="" method="post" enctype="multipart/form-data">
                    <section class="m-3 p-2">
                        <label for="image">Blogs images :</label>
                        <input type="file" name="image" value="<?php echo $image; ?>" placeholder="Enter Perfume Name"
                            class="form-control" required>
                    </section>
                    <section class="m-3 p-2">
                        <label for="title">Blogs Title :</label>
                        <input type="text" name="title" value="<?php echo $title; ?>" placeholder="Enter Perfume Name"
                            class="form-control" required>
                    </section>
                    <section class="m-3 p-2">
                        <label for="bio">Blogs Bio :</label>
                        <input type="text" name="bio" value="<?php echo $bio; ?>" placeholder="Enter Perfume Name"
                            class="form-control" required>
                    </section>
                    <input type="submit" value="update" name="update" class="btn btn-block btn-danger">
                </form>
            </section>
        </main>
        <footer class="">

        </footer>
    </body>

</html>