<?php
$connect = mysqli_connect(
  'db', # service name
  'fritz.furittsu', # username
  'CanNeverGu355Th15Passw0rD', # password
  'police_ops' # db table
);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
