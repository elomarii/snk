<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
  </head>
  <body>

    <?php
    include 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT username, password FROM police WHERE username = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($username, $password_db);
        $stmt->fetch();

        if ($password === $password_db) {
            $_SESSION['username'] = $username;
            echo "Login successful! Welcome, " . htmlspecialchars($username) . ".";
        } else {
            echo "Invalid username or password.";
        }

        $stmt->close();
        $connect->close();
    }
    ?>

    <!-- Login form -->
    <form method="post" action="">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>

  </body>
</html>