<?php
    include "db_connection.php";

    $query = "SELECT * from messages";
    $resp = mysqli_query($connect, $query);
    
    echo '<div style="display: flex; width: 100%; max-width: 700px">';
    
    while ($record = mysqli_fetch_assoc($resp)) {
        echo "<h3>From " . $record["sender"] . "</h3>";
        echo $record['date'];
        echo "<br>";
        echo $record['content'];
        echo "<br>";
    }
    
    echo '</div>';
?>