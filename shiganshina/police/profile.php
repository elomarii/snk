<style>
  .profily-container {
    display: flex;
    width: 100%;
    background-color: #eee;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    overflow: hidden;
    /* margin: 50px; */
    margin-top: 50px;
  }

  .profily-left {
    background-color: #2d3436;
    color: #fff;
    padding: 20px;
    text-align: center;
    flex: 1;
  }

  .profily-picture {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      margin-bottom: 20px;
      border: 4px solid #fff;
  }

  .profily-name {
      font-size: 24px;
      margin: 0;
  }

  .profily-right {
      padding: 20px;
      flex: 3;
  }

  .profily-description {
      font-size: 16px;
      line-height: 1.6;
      color: #333;
  }
</style>

<?php
  include "db_connection.php";

  $username = $_SESSION["username"];
  $query = "SELECT name, pp from police WHERE username = '$username'";

  $resp = mysqli_query($connect, $query);
  $record = mysqli_fetch_assoc($resp);
  if ($record) {
    echo '<div class="profily-container">';
    echo '    <div class="profily-left">';
    echo '    <img src="'.$record['pp'].'" alt="Profile Picture" class="profily-picture">';
    echo '    <h2 class="profily-name">'.$record['name'].'</h2>';
    echo '    </div>';
    echo '    <div class="profily-right">';
    echo '        <p class="profily-description">';
    echo '            Welcome fellow comrade.<br><br>[!] Don\'t forget to check the latest anouncement in the ';
    echo '            messages tab.<br>[!] Missions assignments will be anounced soon too.';
    echo '            <br> <br>Long live humanity';
    echo '        </p>';
    echo '    </div>';
    echo '</div>';
  }
?>