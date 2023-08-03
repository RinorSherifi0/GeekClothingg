<?php

session_start();
 $db_host = "localhost";
  $db_username = "root";
  $db_password = "";
  $db_name = "artwear";
$connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if(isset($_GET['url_id'])) {
  $url_id = $_GET['url_id'];
  $currentDateTime = date("Y-m-d H:i:s");
  $query = "SELECT * FROM redirects WHERE qr_id='$url_id' AND from_ <= '$currentDateTime' AND to_ >= '$currentDateTime'";
  $result = mysqli_query($connection, $query);
  $row = mysqli_fetch_assoc($result);
 $userAgent = $_SERVER['HTTP_USER_AGENT'];

    $result = mysqli_query($connection, $query);
    $query = "INSERT INTO url_count (url_id, device) VALUES ('$url_id','$userAgent')";
    $result = mysqli_query($connection, $query);

  header("Location: ".$row['redirect_url']);
  exit();
}



mysqli_close($connection);



?>
