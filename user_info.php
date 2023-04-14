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

</head>

<body>
    <?php $row = $result -> fetch_assoc(); ?>
    <div class="card" id="most_popular">
        <div class="card-body">
            <div class="post-author">
                <h6><?php echo $row["UserID"]?></h6>
                <small><?php echo $row["Username"]?></small>
            </div>
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