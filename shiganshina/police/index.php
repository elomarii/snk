<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Police portal</title>
    <link rel="stylesheet" href="../style.css">
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
      } elseif (!isset($_GET['view'])) {
        include "profile.php";
      } else {
        // LFI vulnerability, source code disclosure
        include $_GET['view'] . ".php";
      }
    ?>
  </body>
</html>
