<?php
/*
// Start the session (if not already started)
session_start();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password are valid (in this example, just hardcoding a single user)
    if ($username == 'admin' && $password == 'password') {
        // Login successful, store the user ID in the session
        $_SESSION['user_id'] = 1;

        // Redirect to the dashboard page
        header('Location: dashboard.php');
        exit;
    } else {
        // Login failed, display an error message
        $error = 'Invalid username or password';
    }
}
*/
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
                <div class="col-sm-4">
                    <a href="index.php" id="closeButton"><i class="material-icons md-24">close</i></a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-4" id="createTitle">
                    <h2>Sign up to PolyU Forum~</h2>
                </div>
                <?php
                include 'DBconnection.php';

                if(isset($_POST['signup'])){
                   $name = mysqli_real_escape_string($conn, $_POST["username"]);
                   $password = $_POST["password"];
                   $sql = "SELECT * FROM user WHERE Username = '$name'";
                   $result = mysqli_query($conn, $sql);
                   if(mysqli_num_rows($result) > 0){
                      echo "<p>User already exists!</p>";
                   }
                   else{
                      $findLastRecordSql = "SELECT * FROM user ORDER BY UserID DESC LIMIT 1";
                      $lastRecord = mysqli_query($conn, $findLastRecordSql);
                      if ($lastRecord->num_rows > 0) {while($row = $lastRecord->fetch_assoc()) {
                          $newUserId = $row["UserID"] + 1;
                      }
                      $insertSql = "INSERT INTO user VALUES ($newUserId, '$name', '$password')";
                      mysqli_query($conn,$insertSql);
                      header("Location:login.php");
                   }
                }
                }
                ?>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <form action="signup.php" method="post" class="was-validated">
                        <div class="form-group">
                            <h6>Name:</h6>
                            <input type="text" class="form-control" name="username" placeholder="Input here..." required>
                        </div>
                        <div class="form-group">
                            <h6>Password:</h6>
                            <input type="text" class="form-control" name="password" placeholder="Input here..." required>
                        </div>
                        
                        <button type="submit" class="btn btn-secondary" name="signup">Sign up</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-4" style = "text-align: center;">
                <h6>Or do you have an account already? Log In <a class = "Herelogin" href="login.php">Here</a></h6>
            </div>
        </div>
    </div>
</body>
</html>
