<?php
    session_start();
    include("./connection.php");

    if(!isset($_GET["perfume"])){
        header("location:./viewPerumes.php");
    }

    $id = $_GET["perfume"];
        $query = "delete from tbl_perfumes where pid = $id";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "            <script type='text/javascript'>
            alert('Perfume Updated Successfully');
        </script>";

        }

?>

<?php
    if($result){
        header("location:./viewPerfumes.php");
        exit();
    }
?>