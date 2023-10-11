<?php

    include("./connection.php");


    $name = "";
    $phno = "";
    $passwd = "";
    $confirmPasswd = "";
    $nameErr = "";
    $phnoErr = "";
    $passwdErr = "";
    $confirmPasswdErr  = "";
    $valid = "";
    

    if(isset($_POST["signup"]) && $_POST["signup"]=="SignUP" ){
        $name = $_POST["name"];
        $phno = $_POST["phno"];
        $passwd = $_POST["password"];
        $confirmPasswd = $_POST["confirmPassword"];
        $name = trim($name);
        $phno = trim($phno);
        $passwd = trim($passwd);
        $confirmPasswd = trim($confirmPasswd);
        $valid = true;


        if(empty($name)){
            $nameErr = "Please Enter a Valid Name.!";
            $valid = false;
        }
        if(empty($phno)){
            $phnoErr = "Please Enter a Valid phno.!";
            $valid = false;
        }
        if(empty($passwd)){
            $passwdErrErr = "Please Enter a Valid Password.!";
            $valid = false;
        }
        if(empty($confirmPasswd)){
            $confirmPasswdErr = "Please Enter a Valid Confirm Password.!";
            $valid = false;
        }
        if($passwd != $confirmPasswd){
            $confirmPasswdErr = "Password and Confirm Password Should be Same.!";
            $valid = false;
        }

        if($valid){
            $passwd = password_hash($passwd,1);
            $query = "insert into tbl_user values(NULL,'$name',$phno,'$passwd','USER')";
            echo $query;
            if(mysqli_query($conn,$query)){
                
              echo  " <script>
                    alert('Sign Up SuccessFully.!');
                </script>";
                
                header("location:./login.php");
            }
        }
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
<header class="bg-primary text-center p-3 text-light">
        <p class="display-1">Perfume Store</p>
    </header>
    <main class="container mt-2 p-2">
        <section class="jumbotron p-5">
            <h2 class="text-center bg-primary text-light p-2">SignUP</h2>
            <form action="" method="post">
            <section class="m-3 p-2">
                    <label for="name">Full Name :</label>
                    <input type="text" name="name" value="<?php echo $name;?>" placeholder="Enter Full Name" class="form-control" required>
                    <?php
                        if($nameErr){
                            echo "<p class='text-danger mt-2'>$nameErr</p>";
                        }
                    ?>
                </section>
                <section class="m-3 p-2">
                    <label for="name">Phone Number : </label>
                    <input type="tel" name="phno" placeholder="Enter Mobile No."  value="<?php echo $phno;?>" class="form-control" required>
                    <?php
                        if($phnoErr){
                            echo "<p class='text-danger mt-2'>$phnoErr</p>";
                        }
                    ?>
                </section>
                <section class="m-3 p-2">
                    <label for="name">Password : </label>
                    <input type="password" name="password" placeholder="Enter Password"  value="<?php echo $passwd;?>" class="form-control" required>
                    <?php
                        if($passwdErr){
                            echo "<p class='text-danger mt-2'>$passwdErr</p>";
                        }
                    ?>
                </section>
                <section class="m-3 p-2">
                    <label for="name">Confirm Password : </label>
                    <input type="password" name="confirmPassword" placeholder="Enter Confirm Password"  value="<?php echo $confirmPasswd;?>" class="form-control" required>
                    <?php
                        if($confirmPasswdErr){
                            echo "<p class='text-danger mt-2'>$confirmPasswdErr</p>";
                        }
                    ?>
                </section>
                <input type="submit" value="SignUP" name="signup" class="btn btn-block btn-danger">

            </form>

            <p class="text-primary">
                Already a user                 
            </p>
            <a href="./login.php" class="btn btn-primary">Login</a>
        </section>
    </main>
</body>
</html>