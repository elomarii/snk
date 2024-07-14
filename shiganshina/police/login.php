<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        /* Styling the form container */
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        /* Styling the search input field */
        input {
            width: 300px;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        /* Styling the submit button */
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-left: 10px;
        }

        /* Styling the button on hover */
        button:hover {
            background-color: #218838;
        }
    </style>
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
    }
    ?>

    <!-- Login form -->
    <form method="post" action="">
        Username <input type="text" name="username" required><br>
        Password <input type="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>

  </body>
</html>