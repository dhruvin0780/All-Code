<?php
    session_start();
    include("./connection.php");

    if(!isset($_GET["perfume"])){
        header("location:./viewPerumes.php");
    }

    $id = $_GET["perfume"];
    $query = "select * from tbl_perfumes where pid = $id";
    $result = mysqli_query($conn,$query);
    if(!$result){
        header("location:./viewPerumes.php");
    }
    $row = mysqli_fetch_assoc($result);
    $name = $row["name"];
    $type = $row["type"];
    $price = $row["price"];
    $nameErr="";
    $typeErr="";
    $priceErr="";
    $result = false;

    if(isset($_POST["update"])&&$_POST["update"]=="Update"){
        $name = $_POST["name"];
        $type = $_POST["type"];
        $price = $_POST["price"];

        $query = "update tbl_perfumes set name='$name',type='$type',price=$price where pid = $id";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "            <script type='text/javascript'>
            alert('Perfume Updated Successfully');
        </script>";

        }
    }

?>

<?php
    if($result){
        header("location:./viewPerfumes.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Perfume</title>
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
                <input type="submit" value="Update" name="update" class="btn btn-block btn-danger">

            </form>
        </section>
    </main>
    <footer class="">

    </footer>
</body>
</html>
