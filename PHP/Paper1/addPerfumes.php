<?php
session_start();
include("./connection.php");
if (!isset($_SESSION["loggedin"]) || $_SESSION["role"] != "ADMIN") {
    header("location:./login.php");
    exit();
}

$name = "";
$type= "";
$price = "";
$nameErr = "";
$typeErr= "";
$priceErr = "";

if(isset($_POST["add"])&&$_POST["add"]=="Add"){
    $name = $_POST["name"];
    $type = $_POST["type"];
    $price = $_POST["price"];

    $query = "insert into tbl_perfumes values(NULL,'$name','$type',$price)";
    if(mysqli_query($conn,$query)){
        echo "
            <script>
                alert('Perfume Added Successfully');
            </script>
        ";

$name = "";
$type= "";
$price = "";
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
        <p class="display-1">Perfume Store</p>
    </header>
    <?php
    include("navbar.php");
    ?>
    <main class="p-5 container">
        <section class="jumbotron p-4">
            <form action="" method="post">
                <section class="m-3 p-2">
                    <label for="name">Perfume Name :</label>
                    <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Enter Perfume Name"
                        class="form-control" required>
                    <?php
                    if ($nameErr) {
                        echo "<p class='text-danger mt-2'>$nameErr</p>";
                    }
                    ?>
                </section>
                <section class="m-3 p-2">
                    <label for="name">Type : </label>
                    <select name="type" id="" class="form-control" required>
                        <option value="" <?php if($type=="") echo "selected"; ?>>---Select perfume Type---</option>
                        <option value="Male"   <?php if($type=="Male") echo "selected"; ?>>Males</option>
                        <option value="Female"  <?php if($type=="Female") echo "selected"; ?> >Female</option>
                        <option value="Bisexual"   <?php if($type=="Bisexual") echo "selected"; ?>>Bisexual</option>
                    </select>
                    <?php
                    if ($typeErr) {
                        echo "<p class='text-danger mt-2'>$typeErr</p>";
                    }
                    ?>
                </section>
                <section class="m-3 p-2">
                    <label for="name">Price : </label>
                    <input type="Number" name="price" placeholder="Enter Price" value="<?php echo $price; ?>"
                        class="form-control" required>
                    <?php
                    if ($priceErr) {
                        echo "<p class='text-danger mt-2'>$priceErr</p>";
                    }
                    ?>
                </section>
                <input type="submit" value="Add" name="add" class="btn btn-block btn-danger">

            </form>
        </section>
    </main>
    <footer class="">

    </footer>
</body>

</html>