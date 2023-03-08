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
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($error)): ?>
        <p><?= $error ?></p>
    <?php endif ?>

    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>