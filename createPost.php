<?php
include 'DBconnection.php';

if(isset($_POST['publish'])){
    $findLastRecordSql = "SELECT * FROM post_record ORDER BY PostID DESC LIMIT 1";
    $lastRecord = mysqli_query($conn, $findLastRecordSql);
    if ($lastRecord->num_rows > 0) {while($row = $lastRecord->fetch_assoc()) {
        $newPostID = $row["PostID"] + 1;
    }
    $postType = $_POST["postType"];
    $postTitle = $_POST["postTitle"];
    $postBody = $_POST["postBody"];
    $timestamp = date("Y-m-d H:i:s");


    $userID = 00001; #id of user who creates the post, need login

    $insertSql = "INSERT INTO post_record VALUES ($newPostID, '$postType', '$postTitle','$postBody',$timestamp,$userID)"; #lacks image
    mysqli_query($conn,$insertSql);
    header("Location:index.php");
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create a post</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!--Add Bootstrap framework into the HTML file-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!---->

</head>

<body>
    <div class="container-fluid" style="margin-top:100px">
        <div class="postForm">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <a href="index.php" id="closeButton"><i class="material-icons md-24">close</i></a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6" id="createTitle">
                    <h2>Create a Post</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <form action="createPost.php" class="was-validated">
                        <div class="form-group">
                            <h6>Category:</h6>
                            <select class="custom-select" name="postType">
                                <option value="PolyU Life">PolyU Life</option>
                                <option value="Faculty News">Faculty News</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h6>Title:</h6>
                            <input type="text" class="form-control" name="postTitle" placeholder="Input here..." required>
                        </div>
                        <div class="form-group">
                            <h6>Body:</h6>
                            <textarea class="form-control" name="postBody" rows="4" placeholder="Input here..." required></textarea>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile"><i class="material-icons">add_a_photo</i> Add photo...</label>
                        </div>
                        <button type="submit" class="btn btn-secondary" name="publish">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>
