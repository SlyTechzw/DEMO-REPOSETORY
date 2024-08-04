# login form
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat-password"];

    // Perform validation
    $errors = [];
    if (empty($fullname)) {
        $errors[] = "Full name is required.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }
    if ($password !== $repeat_password) {
        $errors[] = "Passwords do not match.";
    }

    // If there are no errors, you can save the user data to a database or perform other actions
    if (empty($errors)) {
        // Save the user data to a database or perform other actions
        echo "Sign-up successful! Redirecting to the login page...";
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <?php if (!empty($errors)) { ?>
            <div class="error-message">
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?php echo $error; ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" value="<?php echo isset($fullname) ? $fullname : ''; ?>">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter your email" value="<?php echo isset($email) ? $email : ''; ?>">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter a username" value="<?php echo isset($username) ? $username : ''; ?>">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter a password">

            <label for="repeat-password">Repeat Password:</label>
            <input type="password" id="repeat-password" name="repeat-password" placeholder="Repeat your password">

            <button type="submit">Sign Up</button>
        </form>
        <div class="login-link">
            Already have an account? <a href="login.php">Log in</a>
        </div>
    </div>
</body>
</html>