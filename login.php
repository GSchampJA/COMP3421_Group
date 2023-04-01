<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type=text/css href="style.css">
</head>
<style>
    body{
    background: url(background.jpg);
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
    <?php
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
    ?>
    <div class="loginbox">
        <img src="loginlogo.png" class="icon">
        <h1>Login</h1>

        <?php if (isset($error)): ?>
        <p>
            <?= $error ?>
        </p>
        <?php endif ?>

        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            <h4> <a href="signup.php">Don't have an account?</a></h4>

            <button type="submit">Login</button>
        </form>
</body>

</html>