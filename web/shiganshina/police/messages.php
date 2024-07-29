<?php
    include "db_connection.php";

    $query = "SELECT * from messages";
    $resp = mysqli_query($connect, $query);
    
    
    while ($record = mysqli_fetch_assoc($resp)) {
        echo "<div class='message-bubble'>";
        echo "    <div class='sender'>" . $record["sender"] . "</div>";
        echo "    <div class='date'>".$record['date']."</div>";
        echo "    <div class='content'>".$record['content']."</div>";
        echo "</div>";
    }
    
    echo '</div>';
?>