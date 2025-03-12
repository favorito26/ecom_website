<?php
require('connection.inc.php');
require('functions.inc.php');

$msg = "";
if (isset($_POST['submit'])) {
    $username = get_safe_value($conn, $_POST['username']);
    $password = get_safe_value($conn, $_POST['password']);
    
    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['ADMIN_LOGIN'] = 'yes';
        $_SESSION['ADMIN_USERNAME'] = $username;
        header('location: categories.php'); // Redirect to dashboard
        exit(); // Stop further execution
    } else {
        $msg = "Invalid username or password";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/output.css">
    <title>Login</title>
</head>
<body class="bg-gray-800">
    <main class="login">
        <section>
            <h1>Login</h1>
            <form class="form-login" action="" method="POST">
                <article>
                    <label>Username:</label>
                    <input class="login_input" name="username" placeholder="Username" required>
                </article>
                <article>
                    <label>Password:</label>
                    <input class="login_input" type="password" name="password" placeholder="Password" required>
                </article>
                <button type="submit" name="submit" class="submit">Sign in</button>
                <p class="text-red-700 m-0"><?php echo $msg; ?></p>
            </form>
        </section>
    </main>
</body>
</html>