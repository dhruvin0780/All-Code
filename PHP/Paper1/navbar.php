
<nav class="navbar navbar-expand-md bg-dark text-light sticky-top">
        <a href="#" class="navbar-brand text-light">Perfumes</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="./index.php" rel="noopener noreferrer" class="btn btn-primary m-2">Home</a>
            </li>
            <?php
                if($_SESSION["role"]=="ADMIN"){
                    ?>
                                <li class="nav-item">
                <a href="./addPerfumes.php" rel="noopener noreferrer" class="btn btn-primary m-2">Add Perfume</a>
            </li>
              <li class="nav-item">
                <a href="./viewPerfumes.php" rel="noopener noreferrer" class="btn btn-primary m-2">View Perfume</a>
            </li>
                    <?php
                }
                else{
                    ?>
                                <li class="nav-item">
                <a href="viewPerfumes.php" rel="noopener noreferrer" class="btn btn-primary m-2">View Perfumes</a>
            </li>
            <li class="nav-item">
            </li>
                    <?php


                }

                ///////////////////////////
                if($_SESSION["role"]=="ADMIN"){
                    ?>
                                <li class="nav-item">
                <a href="./addBlog.php" rel="noopener noreferrer" class="btn btn-primary m-2">Add Blog</a>
            </li>
              <li class="nav-item">
                <a href="./viewBlog.php" rel="noopener noreferrer" class="btn btn-primary m-2">View Blog</a>
            </li>
                    <?php
                }
                else{
                    ?>
                        <li class="nav-item">
                            <a href="./viewBlog.php" rel="noopener noreferrer" class="btn btn-primary m-2">View Blog</a>
                        </li>
                        <li class="nav-item">
                    </li>
                    <?php


                }
            ?>
                           <li class="nav-item">
                <a href="logout.php"  rel="noopener noreferrer" class="btn btn-danger m-2">Logout</a>
            </li>
        </ul>
    </nav>