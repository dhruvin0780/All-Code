<?php
session_start();
include("./connection.php");
if (!isset($_SESSION["loggedin"])) {
    header("location:./login.php");
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>View Perfumes Blogs</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    </head>

    <body>
        <header class="bg-primary text-center p-3 text-light">
            <p class="display-1">Perfume Store Blogs</p>
        </header>
        <?php
        include("navbar.php");
        ?>
        <main class="p-5 container">
            <section class="jumbotron p-4">
                <table class="table table-bordered table-striped bg-white">
                    <thead>
                        <tr>
                            <td></td>
                            <td>Image</td>
                            <td>Title</td>
                            <td>Bio</td>
                            <?php
                            if ($_SESSION["role"] == "ADMIN") {
                                ?>
                                <td>Update</td>
                                <td>Delete</td>
                                <?php
                            }
                            ?>

                        </tr>
                    </thead>
                    <tbody id="perfumeData">

                    </tbody>
                </table>
            </section>
        </main>
        <footer class="">

        </footer>
        <script src="./jquery-3.6.3.js"></script>
        <script type="text/javascript">
            $(document).ready(() => {
                $.ajax({
                    url: "./SearchBlog.php",
                    type: "GET",
                    success: function (data) {
                        $("#perfumeData").html(data);
                    }
                })
            })
        </script>
    </body>

</html>