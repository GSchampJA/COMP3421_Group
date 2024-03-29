﻿<?php
    session_start();
    include 'DBconnection.php';
    if(!isset($_SESSION['PostID'])){
        $_SESSION['PostID'] = $_GET['PostID'];
    }
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
                    <a class="btn" href="logout.php" role="button" data-toggle="tooltip" data-placement="bottom">Logout</a>
                    <a class="btn" href="createPost.php" role="button" data-toggle="tooltip" data-placement="bottom" title="Create post"><i class="material-icons md-24">add_box</i></a>
                    
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
    <!---->

    <div class="container-fluid" style="margin-top:90px">
        <?php
        $sql = "SELECT * FROM post_record WHERE PostID = '{$_SESSION['PostID']}'";
        $res = mysqli_query($conn, $sql);
        $row = $res->fetch_assoc();
        $userid = $row["UserID"];
        $usersql = "SELECT * FROM user WHERE UserID = $userid";
        $userquery = mysqli_query($conn, $usersql);
        $user = $userquery->fetch_assoc();
        ?>
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4"><?php echo $row["Posttitle"] ?></h1>
                    <p class="lead"><?php echo $row["Postcontent"] ?></p>
                    <hr class="my-4">
                    <p>Created by: <?php echo $user["Username"] ?></p>
                    <p>Created at: <?php echo $row["Posttime"] ?></p>
                </div>
            </div>
        <div class="row justify-content-center">
            <h4>Add Comment</h4><a class="btn" id="showModal" data-toggle="modal" data-target="#noticeModal" role="button" data-toggle="tooltip" data-placement="bottom" title="Create post"><i class="material-icons md-24">add_box</i></a>
            <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="noticeModalLabel">Want to comment?</h5>
                        <button type="button" id="hideModal" aria-label="Close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="singlePost.php" method="post" class="was-validated">
                            <h6 class="model-subtitle">Content</h6>
                            <input type="text" class="form-control" name="Commentconent" placeholder="Input here..." maxlength="40" required>
                            <hr>
                            <button type="submit" class="btn btn-secondary" name="publish">Publish</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            include 'DBconnection.php';
            if(isset($_POST['publish'])){
                $findLastRecordSql = "SELECT * FROM comment_record ORDER BY CommentID DESC LIMIT 1";
                $lastRecord = mysqli_query($conn, $findLastRecordSql);
                if ($lastRecord->num_rows > 0) {
                    while($row = $lastRecord->fetch_assoc()) {
                        echo $row["CommentID"];
                        $newCommentID = $row["CommentID"] + 1;
                    }
                    $Commentconent = $_POST["Commentconent"];
                    $timestamp = date("Y-m-d H:i:s");
                    $userID = $_SESSION['userid'];
                    $insertSql = "INSERT INTO comment_record VALUES ($newCommentID, '{$_SESSION['PostID']}', $userID,'$Commentconent','$timestamp')";
                    mysqli_query($conn,$insertSql);
                }
            } 
        ?>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-3">
                <div class="vstack gap-3">
                    <?php
                    $commentsql = "SELECT * FROM comment_record WHERE PostID = '{$_SESSION['PostID']}'";
                    $commentquery = mysqli_query($conn, $commentsql);
                    if (mysqli_num_rows($commentquery) > 0) {
                        for ($c = 0; $c < mysqli_num_rows($commentquery); $c++) {
                            $comment = $commentquery->fetch_assoc();
                            $userid = $comment["UserID"];
                            $usersql = "SELECT * FROM user WHERE UserID = $userid";
                            $userquery = mysqli_query($conn, $usersql);
                            $user = $userquery->fetch_assoc();
                            ?>
                            <div class="card">
                                <div class="card-header">
                                    <?php echo $user["Username"] ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $comment["Commentcontent"] ?></h5>
                                    <p class="card-text"><?php echo $comment["Commenttime"] ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

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