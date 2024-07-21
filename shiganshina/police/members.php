<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Police portal</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: Arial, sans-serif;
        display: grid;
        place-items: center;
        background-color: silver;
      }

      .content {
        max-width: 600px;
        position: relative;
      }

      .navbar {
        background-color: #006200;
        color: white;
        padding: 1rem;
        width: 100vw;
      }

      .navbar-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
        text-decoration: none;
        color: white;
      }

      .navbar-menu {
          list-style: none;
          display: flex;
      }

      .navbar-menu li {
          margin-left: 1rem;
      }

      .navbar-menu a {
          text-decoration: none;
          color: white;
          padding: 0.5rem 1rem;
          transition: background 0.3s;
      }

      .navbar-menu a:hover {
          background-color: #005500;
      }

      /* Responsive adjustments */
      @media (max-width: 650px) {
          .navbar-container {
              flex-direction: column;
              align-items: flex-start;
          }
        
          .navbar-menu {
              flex-direction: column;
              width: 100%;
          }
        
          .navbar-menu li {
              width: 100%;
              text-align: left;
          }
        
          .navbar-menu a {
              width: 100%;
              padding: 1rem;
              box-sizing: border-box;
          }
      }
      
      .horizontal-container {
        display: flex;
        flex-direction: row; /* Default value, can be omitted */
        justify-content: flex-start; /* Align items to the start */
        gap: 10px; /* Optional: Adds space between items */
      }
      form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
        }

        input {
            width: 300px;
            padding: 10px;
            border: 2px solid #006200;
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
            margin-top: 10px;
        }

        /* Styling the button on hover */
        button:hover {
            background-color: #218838;
        }

        .profile-card-container {
          display: grid;
          grid-template-columns: repeat(3, 1fr); /* Three columns, each occupying equal space */
          gap: 20px; /* Gap between cards */
          padding: 20px; /* Padding around the container */
          width: 100%; /* Full width of the container */
          max-width: 700px; /* Maximum width to maintain layout balance */
          margin: 0 auto; /* Center align the grid */
      }

      /* Profile Card */
      .profile-card {
          background-color: white; /* Card background color */
          border-radius: 10px; /* Rounded corners */
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
          overflow: hidden; /* Ensure rounded corners apply */
          text-align: center; /* Center align text */
          transition: box-shadow 0.3s ease; /* Smooth shadow transition */
      }

      .profile-card:hover {
          box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Shadow increase on hover */
      }

      .profile-image img {
          width: 100%; /* Full width image */
          height: auto; /* Maintain aspect ratio */
          max-height: 200px
      }

      .profile-info {
          padding: 20px; /* Padding inside the card */
      }

      .profile-name {
          font-size: 1.5em; /* Larger font size for name */
          margin-bottom: 10px; /* Space below the name */
          color: #333; /* Dark text color */
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
          <a href="index.php">
              <div class="horizontal-container">
                <img src="../../images/military.png" style="height: 40px" />  
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
        echo '  <input placeholder="Search police .." type="text" id="query" name="query" required>';
        echo '  <button type="submit">Search</button>';
        echo '</form>';

        include "db_connection.php";
        $name = "";
        
        if (isset($_GET['query'])) {
          $name = $_GET['query'];
        }
      
        // SQLi vulnerability
        try {
          $query = "SELECT name, pp from police WHERE name LIKE '%$name%'";
          $resp = mysqli_query($connect, $query);
        } catch (\Throwable $th) {
          echo "Ivalide Query";
          die();
        }
      
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


