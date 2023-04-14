<?php 
    include 'DBconnection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>PolyU Forum</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <!--Add Bootstrap framework into the HTML file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!---->

</head>

<body id = "mainpage">
    <!--Bootstrap navigation bar-->
    <nav class="navbar fixed-top navbar navbar-custom">
        <a class="navbar-brand" href="index.php">
            <img src="images/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
            PolyU Forum
        </a>
        <div class="navBar">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Posts
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <button class="dropdown-item" type="button">PolyU Life</button>
                        <button class="dropdown-item" type="button">Faculty News</button>
                    </div>
                </div>
                <a class="btn" href="createPost.php" role="button" data-toggle="tooltip" data-placement="bottom" title="Create post"><i class="material-icons md-24">add_box</i></a>
                <a class="btn" id = "usericon" href="signup.php" role="button" data-toggle="tooltip" data-placement="bottom" title="User"><i class="material-icons md-24">account_circle</i></a> <!--Replace i in js-->
            </div>
        </div>
    </nav>
    <!---->

    <!--Posts-->
    <div class="container-fluid" style="margin-top:90px">
        <div class="row">
            <div class="col-sm-12" id="postSession">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="vstack gap-3">
                        <?php
                            $sql = "SELECT * FROM post_record";
                            $res = mysqli_query($conn, $sql);
                            $count_row = mysqli_num_rows($res);
                            for($x = 0; $x < $count_row; $x++){
                                $row = $res -> fetch_assoc();
                                // find out the post of "PolyU Life"
                                if($row["Posttype"]=="PolyU Life"){
                                ?>
                                    <!-- print out the post -->
                                    <div class="post-card" id = "most_popular">
                                        <div class="post-content" style="border: 0.5rem solid var(--color-navyblue);border-radius: 15px; margin-bottom: 1rem; padding:1rem;">
                                            <a href="#" class="category-button most-popular"><?php echo $row["Posttype"]?></a>
                                            <h3 class="post-title"><a href="singlePost.php"><?php echo $row["Postcontent"] ?>
                                            </a></h3>
                                            <div class="post-author">
                                                <h5><?php echo $row["Postname"] ?></h5>
                                                <small><?php echo $row["Posttime"] ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                }                 
                            }
                            
                        ?>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="vstack gap-3">
                        <?php
                            $sql = "SELECT * FROM post_record";
                            $res = mysqli_query($conn, $sql);
                            $count_row = mysqli_num_rows($res);
                            for($x = 0; $x < $count_row; $x++){
                                $row = $res -> fetch_assoc();
                                // find out the post of "PolyU Life"
                                if($row["Posttype"]=="Faculty News"){
                                    ?>
                                    <div class="post-card" id = "most_popular">
                                        <div class="post-content" style="border: 0.5rem solid var(--color-navyblue);border-radius: 15px; margin-bottom: 1rem; padding:1rem;">
                                            <a href="#" class="category-button most-popular"><?php echo $row["Posttype"]?></a>
                                            <h3 class="post-title"><a href="singlePost.php"><?php echo $row["Postcontent"] ?>
                                            </a></h3>
                                            <div class="post-author">
                                                <h5><?php echo $row["Postname"] ?></h5>
                                                <small><?php echo $row["Posttime"] ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                }
                            }
                            
                        ?>
                            <!-- <div class="post-card" id = "most_popular">
                                <div class="post-content">
                                    <a href="#" class="category-button most-popular">Most Popular</a>
                                    <h3 class="post-title"><a href="singlePost.php"><?php  ?>
                                    </a></h3>
                                    <div class="post-author">
                                        <h5>By: Jane Doe</h5>
                                        <small>16 March, 2023 - 13:52</small>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---->

    <!--Page footer-->
    <footer>
        <div class="footer-links">
            <a href="https://www38.polyu.edu.hk/eStudent/" target="_blank" data-toggle="tooltip" title="eStudent"><i class="material-icons md-24">key</i></a>
            <a href="https://learn.polyu.edu.hk/" target="_blank" data-toggle="tooltip" title="LEARN@PolyU"><i class="material-icons md-24">collections_bookmark</i></a>
            <a href="https://www.lib.polyu.edu.hk/" target="_blank" data-toggle="tooltip" title="Pao Yue-kong Library"><i class="material-icons md-24">local_library</i></a>
        </div>
        <div class="footer-copyright">
            <small>Copyright &copy; COMP3421 PolyU Forum Group</small>
        </div>
    </footer>
    <!---->
    <script src="script.js"></script>
</body>
</html>