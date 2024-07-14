<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Police portal</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Styling the form container */
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        /* Styling the search input field */
        input[type="text"] {
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
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
          <a href="index.php">
              <div class="horizontal-container">
                <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/062e5e10-0d29-4a44-941a-de4fad7ab823/d741kmk-619f21a8-53ed-4bd7-aa23-f8da5a88364b.png/v1/fill/w_845,h_945,q_75,strp/military_police_brigade_emblem_by_thecuteokami-d741kmk.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwic3ViIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl0sIm9iaiI6W1t7InBhdGgiOiIvZi8wNjJlNWUxMC0wZDI5LTRhNDQtOTQxYS1kZTRmYWQ3YWI4MjMvZDc0MWttay02MTlmMjFhOC01M2VkLTRiZDctYWEyMy1mOGRhNWE4ODM2NGIucG5nIiwid2lkdGgiOiI8PTg0NSIsImhlaWdodCI6Ijw9OTQ1In1dXX0.Rlg0EJtATsN902dHv9fv-Y9yizmXg1C_780SPGPt-Fw" style="height: 40px" />  
                <div style="color: white; font-size: 2em;">Military Police</div>   
              </div>
            </a>
            <ul class="navbar-menu">
                <li><a href="index.php?view=profile">Profile</a></li>
                <li><a href="index.php?view=messages">Messages</a></li>
                <li><a href="members.php">Members</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <?php
      if (!isset($_SESSION['username'])) {
        include "login.php";
      } else {

        echo '<form action="members.php" method="GET">';
        echo '  <input type="text" id="query" name="query" required>';
        echo '  <button type="submit">Search</button>';
        echo '</form>';

        include "db_connection.php";
        $name = "";
        
        if (isset($_GET['query'])) {
          $name = $_GET['query'];
        }
      
        // SQLi vulnerability  
        $query = "SELECT name, pp from police WHERE name LIKE '%$name%'";
        $resp = mysqli_query($connect, $query);
      
        echo '<div class="profile-card-container">';
      
        while ($record = mysqli_fetch_assoc($resp)) {
          echo '<div class="profile-card">';
          echo '  <div class="profile-image">';
          echo '    <img src="'.$record['pp'].'" alt="Profile Picture">';
          echo '  </div>';
          echo '  <div class="profile-info">';
          echo '    <h2 class="profile-name">'.$record['name'].'</h2>';
          echo '  </div>';
          echo '</div>';
        }
      
        echo '</div>';
      }
    ?>
  </body>
</html>


