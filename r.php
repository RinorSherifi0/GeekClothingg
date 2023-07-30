<?php

session_start();
 $db_host = "localhost";
  $db_username = "root";
  $db_password = "";
  $db_name = "artwear";
$connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if(isset($_GET['url_id'])) {
  $url_id = $_GET['url_id'];
  $query = "SELECT * FROM redirects WHERE qr_id='$url_id'";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($result);
  $url = $row['url'];
  $query = "INSERT INTO url_count (url_id, count, device, location) VALUES ('$title', '$url_id', '1', '$device', '$location')";
    $result = mysqli_query($connection, $query);
  $query = "UPDATE url_count SET count=count + 1 WHERE url_id='$url_id'";
  mysqli_query($connection, $query);



  header("Location: ".$row['redirect_url']);
  exit();
}



mysqli_close($connection);
?>
