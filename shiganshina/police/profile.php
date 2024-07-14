
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
    echo '            John is a software engineer with over 10 years of experience in web development.'; 
    echo '            He is passionate about creating efficient and user-friendly applications. In his ';
    echo '            free time, John enjoys hiking, photography, and learning new programming languages.';
    echo '        </p>';
    echo '    </div>';
    echo '</div>';
  }
?>