<?php 
    session_start();
    include 'DBconnection.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title>Login</title>
    <link rel="stylesheet" type=text/css href="style.css">
</head>
<style>
    body{
    background: url("images/background.jpg");
    background-position: center;
    background-size: cover;
    margin: 0;
    padding: 0;
}

.h1 {
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 20px;
}
</style>
<body>
    <div class="loginbox">
        <img src="images/loginlogo.png" class="icon">
        <?php
        include 'DBconnection.php';

        if(isset($_POST['login'])){
            $name = mysqli_real_escape_string($conn, $_POST["username"]);
            $password = $_POST["password"];
            $sql = "SELECT * FROM user WHERE Username = '$name' && Password = '$password'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                $row = $result -> fetch_assoc();
                $_SESSION['username'] = $row["Username"];
                $_SESSION['userid'] = $row["UserID"];
                $_SESSION['loggedin'] = true;
                echo "<h2>Success! Redirecting to home page</h2>";
                echo "<script>
                        setTimeout(function(){
                            window.location.href = 'index.php'; 
                        },2000);
                        const data = '<?php echo $name; ';
                    </script>";
            }
            else{
                echo "<p>Incorrect user name or password!</p>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            <h4> <a href="signup.php">Don't have an account?</a></h4>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>

</html>