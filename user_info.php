<?php 
    session_start();
    if(!isset($_SESSION['loggedin'])){
        $_SESSION['loggedin'] = false;
    }
    else{
        $_SESSION['loggedin'] = true;
    }
    include 'DBconnection.php';

    $sql = "SELECT * FROM user WHERE UserID = '{$_SESSION['userid']}'";
    $result = mysqli_query($conn, $sql);
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
            </div>
        </div>
    </nav>

</head>

<body>
   
    <div class="container-fluid" style="margin-top:90px">
        <div class="jumbotron">
            <?php $row = $result -> fetch_assoc(); ?>
            <h1 class="display-4">Hello, <?php echo $row["Username"]?></h1>
            <p class="lead">User ID: <?php echo $row["UserID"]?></p>
            <hr class="my-4">
            <p>Nice to see you again!</p>
        </div>
    </div>

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