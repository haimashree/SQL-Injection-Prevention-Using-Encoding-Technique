<?php
$userid=$_POST['uid'];
$pass=$_POST['passid'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$userid=base64_encode($userid);
$pass=base64_encode($pass);

$sql = "SELECT * FROM admin where userid='$userid' AND password='$pass'";
$res=$conn->query($sql);
if(!(empty($res)) && $res->num_rows > 0)
  header("Location:admin.html");
else
  echo "Login Failed";
$conn->close();
?>