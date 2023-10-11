<?php

include("./connection.php");


$phno = "";
$passwd = "";
$phnoErr = "";
$passwdErr = "";
$valid = "";


if (isset($_POST["login"]) && $_POST["login"] == "Login") {
    $phno = $_POST["phno"];
    $passwd = $_POST["password"];
    $phno = trim($phno);
    $passwd = trim($passwd);
    $valid = true;



    if (empty($phno)) {
        $phnoErr = "Please Enter a Valid phno.!";
        $valid = false;
    }
    if (empty($passwd)) {
        $passwdErrErr = "Please Enter a Valid Password.!";
        $valid = false;
    }

    if ($valid) {
        $query = "select * from tbl_user where phno=$phno";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows == 1) {
            $row = mysqli_fetch_assoc($result);
            $hashedPasswd = $row["password"];
            $role = $row["role"];
            $uid = $row["uid"];
            $name = $row["name"];
            if (password_verify($passwd, $hashedPasswd)) {
                // echo "Logged in Successfully.";
                session_start();
                $_SESSION["uid"] = $uid;
                $_SESSION["name"] = $name;
                $_SESSION["role"] = $role;
                $_SESSION["loggedin"] = true;
                header("location:./index.php");
                // exit();
            } else {
                $passwdErr = "Incorrect Password";
            }
        } else {
            $phnoErr = "Invalid Mobile Number.!";
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <header class="bg-primary text-center p-3 text-light">
            <p class="display-1">Perfume Store</p>
        </header>
        <main class="container mt-2 p-2">
            <section class="jumbotron p-5">
                <h2 class="text-center bg-primary text-light p-2">Login</h2>
                <form action="" method="post">
                    <section class="m-3 p-2">
                        <label for="name">Phone Number : </label>
                        <input type="tel" name="phno" placeholder="Enter Mobile No." value="<?php echo $phno; ?>"
                            class="form-control" required>
                        <?php
                        if ($phnoErr) {
                            echo "<p class='text-danger mt-2'>$phnoErr</p>";
                        }
                        ?>
                    </section>
                    <section class="m-3 p-2">
                        <label for="name">Password : </label>
                        <input type="password" name="password" placeholder="Enter Password"
                            value="<?php echo $passwd; ?>" class="form-control" required>
                        <?php
                        if ($passwdErr) {
                            echo "<p class='text-danger mt-2'>$passwdErr</p>";
                        }
                        ?>
                    </section>
                    <input type="submit" value="Login" name="login" class="btn btn-block btn-danger">

                </form>
                <p class="text-primary">
                    New user
                </p>
                <a href="./signup.php" class="btn btn-primary">SignUp</a>
            </section>

        </main>
    </body>
</html>