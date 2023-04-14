<?php
    session_start();
    if(!isset($_SESSION['loggedin'])){
        $_SESSION['loggedin'] = false;
    }
    else{
        $_SESSION['loggedin'] = true;
    }
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
                <?php if($_SESSION['loggedin']==true){ ?>
                    <a class="btn" href="logout.php" role="button" data-toggle="tooltip" data-placement="bottom">Logout</a>
                <?php } ?>
                <?php if($_SESSION['loggedin']==true){ ?>
                    <a class="btn" href="createPost.php" role="button" data-toggle="tooltip" data-placement="bottom" title="Create post"><i class="material-icons md-24">add_box</i></a>
                <?php }else{ ?>
                    <a class="btn" id="showModal" data-toggle="modal" data-target="#noticeModal" role="button" data-toggle="tooltip" data-placement="bottom" title="Create post"><i class="material-icons md-24">add_box</i></a>
                <?php } ?>
                <a class="btn" id = "usericon" 
                <?php if($_SESSION['loggedin']!=true){
                    ?> 
                        href="signup.php" 
                        <?php 
                    } 
                    else { 
                    ?> href="user_info.php" 
                    <?php 
                    } 
                ?>role="button" data-toggle="tooltip" data-placement="bottom" title="User"><i class="material-icons md-24">account_circle</i></a>

                <!--Replace i in js-->
            </div>
        </div>
    </nav>
    
    

    <!-- Modal -->
    <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noticeModalLabel">Want to create a post?</h5>
                    <button type="button" id="hideModal" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6><a href="login.php">Login</a> to create post!</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="margin-top:90px">
        <div class="jumbotron">
        <h1 class="display-4">PolyU Biggest Forum</h1>
        <p class="lead">This is a place for PolyU students. Hope you enjoy the time with PolyU, with others, and with us.</p>
        <hr class="my-4">
        <p>If you want to know more about PolyU, feel free to check out the homepage of PolyU.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="https://www.polyu.edu.hk/" role="button">Learn more</a>
        </p>
    </div>

    <!--Posts-->
    
        <div class="row">
            <div class="col-sm-12" id="postSession">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="vstack gap-3">
                            <?php
                                $sql = "SELECT * FROM post_record";
                                $res = mysqli_query($conn, $sql);
                                $count_row = mysqli_num_rows($res);
                                for($x = 0; $x < $count_row; $x++){
                                    $row = $res -> fetch_assoc();
                                    // find out the post of "PolyU Life"
                                    if($row["Posttype"]=="Most Popular"){
                                        if($_SESSION['loggedin'] != true){
                                        ?>
                                            <div class="card" id="most_popular">
                                                <div class="card-body">
                                                    <a href="#" class="card-title category-button most-popular"><?php echo $row["Posttype"]?></a>
                                                    <h3 class="card-subtitle"><a href="signup.php"><?php echo $row["Posttitle"] ?>
                                                    </a></h3>
                                                    <div class="post-author">
                                                        <h6>------------------------------</h6>
                                                        <small>------------------------------</small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="card" id="most_popular">
                                                <div class="card-body">
                                                    <a href="#" class="card-title category-button most-popular"><?php echo $row["Posttype"]?></a>
                                                    <h3 class="card-subtitle"><a href="singlePost.php?PostID=<?php echo $row["PostID"];?>"><?php echo $row["Posttitle"] ?>
                                                    </a></h3>
                                                    <div class="post-author">
                                                        <h6><?php echo $row["Postcontent"] ?></h6>
                                                        <small><?php echo $row["Posttime"] ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                } 
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="vstack gap-3">
                            <?php
                                $sql = "SELECT * FROM post_record";
                                $res = mysqli_query($conn, $sql);
                                $count_row = mysqli_num_rows($res);
                                for($x = 0; $x < $count_row; $x++){
                                    $row = $res -> fetch_assoc();
                                    // find out the post of "PolyU Life"
                                    if($row["Posttype"]=="PolyU Life"){
                                        if($_SESSION['loggedin']!=true){
                                        ?>
                                            <div class="card" id="most_popular">
                                                <div class="card-body">
                                                    <a href="#" class="card-title category-button most-popular"><?php echo $row["Posttype"]?></a>
                                                    <h3 class="card-subtitle"><a href="signup.php"><?php echo $row["Posttitle"] ?>
                                                    </a></h3>
                                                    <div class="post-author">
                                                        <h6>------------------------------</h6>
                                                        <small>------------------------------</small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="card" id="most_popular">
                                                <div class="card-body">
                                                    <a href="#" class="card-title category-button most-popular"><?php echo $row["Posttype"]?></a>
                                                    <h3 class="card-subtitle"><a href="singlePost.php?PostID=<?php echo $row["PostID"];?>"><?php echo $row["Posttitle"] ?>
                                                    </a></h3>
                                                    <div class="post-author">
                                                        <h6><?php echo $row["Postcontent"] ?></h6>
                                                        <small><?php echo $row["Posttime"] ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="vstack gap-3">
                            <?php
                                $sql = "SELECT * FROM post_record";
                                $res = mysqli_query($conn, $sql);
                                $count_row = mysqli_num_rows($res);
                                for($x = 0; $x < $count_row; $x++){
                                    $row = $res -> fetch_assoc();
                                    // find out the post of "PolyU Life"
                                    if($row["Posttype"]=="Faculty News"){
                                        if($_SESSION['loggedin']!=true){
                                        ?>
                                            <div class="card" id="most_popular">
                                                <div class="card-body">
                                                    <a href="#" class="card-title category-button most-popular"><?php echo $row["Posttype"]?></a>
                                                    <h3 class="card-subtitle"><a href="signup.php"><?php echo $row["Posttitle"] ?>
                                                    </a></h3>
                                                    <div class="post-author">
                                                        <h6>------------------------------</h6>
                                                        <small>------------------------------</small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="card" id="most_popular">
                                                <div class="card-body">
                                                    <a href="#" class="card-title category-button most-popular"><?php echo $row["Posttype"]?></a>
                                                    <h3 class="card-subtitle"><a href="singlePost.php?PostID=<?php echo $row["PostID"];?>"><?php echo $row["Posttitle"] ?>
                                                    </a></h3>
                                                    <div class="post-author">
                                                        <h6><?php echo $row["Postcontent"] ?></h6>
                                                        <small><?php echo $row["Posttime"] ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    }
                                }
                            ?>
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
    <!--  Javascript  -->
    <script src="script.js"></script>

    <!--  jQuery  -->
    <script src="script.js">
        $('#showModal').modal('toggle'){
            $('#myModal').modal('show');
        }
        $('#hideModal').modal('toggle'){
            $('#myModal').modal('hide');
        }
    </script>
    
</body>
</html>
