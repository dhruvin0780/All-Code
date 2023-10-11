<?php
session_start();
include("./connection.php");
if (!isset($_SESSION["loggedin"]) || $_SESSION["role"] != "ADMIN") {
    header("location:./login.php");
    exit();
}

if (isset($_POST["add"])) {
    $title = $_POST["title"];
    $bio = $_POST["bio"];

    $image = $_FILES["image"]["name"];
    $tem_name = $_FILES["image"]["tmp_name"];
    $path = "./image/ " . $image;
    move_uploaded_file($tem_name, $path);

    $sql = "INSERT INTO `tbl_blog`(`image`,`title`,`bio`) VALUES('$image','$title','$bio')";
    if (mysqli_query($conn, $sql)) {
        echo "
            <script>
                alert('Perfume Blog Added Successfully');
            </script>
        ";
    } else {
        echo "somthing went wrong";
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
                        <input type="file" name="image" placeholder="Enter Perfume Name" class="form-control" required>
                    </section>
                    <section class="m-3 p-2">
                        <label for="title">Blogs Title :</label>
                        <input type="text" name="title" placeholder="Enter Perfume Name" class="form-control" required>
                    </section>
                    <section class="m-3 p-2">
                        <label for="bio">Blogs Bio :</label>
                        <input type="text" name="bio" placeholder="Enter Perfume Name" class="form-control" required>
                    </section>
                    <input type="submit" value="Add" name="add" class="btn btn-block btn-danger">
                </form>
            </section>
        </main>
        <footer class="">

        </footer>
    </body>

</html>