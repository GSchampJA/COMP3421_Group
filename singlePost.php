<<<<<<< Updated upstream
﻿<?php 
    session_start();
    include 'DBconnection.php';
=======
﻿<?php
session_start();
include 'DBconnection.php';
>>>>>>> Stashed changes
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

<body>
    <!--Bootstrap navigation bar-->
    <nav class="navbar fixed-top navbar navbar-custom">
        <a class="navbar-brand" href="index.php">
            <img src="images/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
            PolyU Forum
        </a>
        <div class="navBar">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Posts
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <button class="dropdown-item" type="button">All</button>
                        <button class="dropdown-item" type="button">Most Popular</button>
                        <button class="dropdown-item" type="button">PolyU Life</button>
                        <button class="dropdown-item" type="button">Faculty News</button>
                    </div>
                </div>
                <a class="btn" href="createPost.php" role="button" data-toggle="tooltip" data-placement="bottom"
                    title="Create post"><i class="material-icons md-24">add_box</i></a>
                <a class="btn" href="#" role="button" data-toggle="tooltip" data-placement="bottom" title="User"><i
                        class="material-icons md-24">account_circle</i></a>
            </div>
        </div>
    </nav>
    <!---->


    <div class="container-fluid" style="margin-top:90px">
        <div class="row">
            <?php
            $postid = $_GET['PostID'];
            $sql = "SELECT * FROM post_record WHERE PostID = $postid";
            $res = mysqli_query($conn, $sql);
            $row = $res->fetch_assoc();
            $userid = $row["UserID"];
            $usersql = "SELECT * FROM user WHERE UserID = $userid";
            $userquery = mysqli_query($conn, $usersql);
            $user = $userquery->fetch_assoc();
            ?>
            <div class="col-sm-12">
                <div class="single-post-container">
                    <h3 class="single-post-title">
                        <?php echo $row["Posttype"] ?>
                    </h3>
                    <h3 class="single-post-title">
                        <?php echo $row["Posttitle"] ?>
                    </h3>
                    <div class="single-post-author">
                        <h5>By:
                            <?php echo $user["Username"] ?>
                        </h5>
                        <small>
                            <?php echo $row["Posttime"] ?>
                        </small>
                    </div>
                    <div class="single-post-paragraph">
                        <p class="single-post-content">
                            <?php echo $row["Postcontent"] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h1>Comment: </h1>
            <a class="btn" id="addcomment" href="#.php" role="button" data-toggle="tooltip" data-placement="bottom"
                title="User"><i class="material-icons md-24">add_comment</i></a>
        </div>

        <div class="col-sm-4">
            <div class="vstack gap-3">
                <?php
                $commentsql = "SELECT * FROM comment_record WHERE PostID = $postid";
                $commentquery = mysqli_query($conn, $commentsql);
                if (mysqli_num_rows($commentquery) > 0) {
                    for ($c = 0; $c < mysqli_num_rows($commentquery); $c++) {
                        $comment = $commentquery->fetch_assoc();
                        $userid = $comment["UserID"];
                        $usersql = "SELECT * FROM user WHERE UserID = $userid";
                        $userquery = mysqli_query($conn, $usersql);
                        $user = $userquery->fetch_assoc();
                        ?>
                        <div class="card-body">
                            <h3 class="card-subtitle">
                                <?php echo $comment["Commentcontent"] ?>
                            </h3>
                            <div class="post-author">
                                <h5>By:
                                    <?php echo $user["Username"] ?>
                                </h5>
                                <small>
                                    <?php echo $comment["Commenttime"] ?>
                                </small>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
        </div>

        <!-- <div class="col-sm-12">
                <div class="single-post-container">
                    <h3 class="single-post-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    <div class="single-post-author">
                        <h5>By: Jane Doe</h5>
                        <small>16 March, 2023 - 13:52</small>
                    </div>
                    <?php 
                        $PostID = $_GET['PostID'];
                        echo $PostID;
                        echo $_SESSION['username'];
                    ?>
                    <div class="single-post-paragraph">
                        <p class="single-post-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed dolor ut nisl pharetra aliquet at et sapien.Vestibulum non tempor elit. Quisque id feugiat leo, finibus mattis urna.Sed finibus, nulla in luctus pretium, felis nunc consectetur velit, et lacinia nisi enim sit amet nisl. Nunc lacinia magna sit amet massa posuere, eget maximus quam viverra. Pellentesque vulputate lacus eu elementum pharetra. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>

            </div> -->

        <!--Page footer-->
        <footer>
            <div class="footer-links">
                <a href="https://www38.polyu.edu.hk/eStudent/" target="_blank" data-toggle="tooltip" title="eStudent"><i
                        class="material-icons md-24">key</i></a>
                <a href="https://learn.polyu.edu.hk/" target="_blank" data-toggle="tooltip" title="LEARN@PolyU"><i
                        class="material-icons md-24">collections_bookmark</i></a>
                <a href="https://www.lib.polyu.edu.hk/" target="_blank" data-toggle="tooltip"
                    title="Pao Yue-kong Library"><i class="material-icons md-24">local_library</i></a>
            </div>
            <div class="footer-copyright">
                <small>Copyright &copy; COMP3421 PolyU Forum Group</small>
            </div>
        </footer>
        <!---->
        <script src="script.js"></script>
</body>

</html>