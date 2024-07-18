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

      .message-bubble {
        background-color: #eee;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        /* max-width: 300px; */
        width: 100%;
        margin-top: 10px;
        margin-bottom: 10px;
      }

      .sender {
        font-weight: bold;
        margin-bottom: 5px;
      }

      .date {
        color: #888;
        font-size: 0.9em;
        margin-bottom: 10px;
      }

      .content {
        font-size: 1em;
      }

    </style>
  </head>
  <body>
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
    <!-- <h3>Alert : all members invoked in /0ff1c3rs_leak.zip should change their passwords ASAP</h3> -->
    <div class="content">
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
    </div>
  </body>
</html>
