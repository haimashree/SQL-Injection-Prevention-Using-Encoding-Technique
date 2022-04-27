<?php
$userid=$_POST['uid'];
$pass=$_POST['passid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$country=$_POST['country'];
$email=$_POST['email'];

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

$sql = "INSERT INTO user_details VALUES ('$userid','$pass','$fname','$lname','$gender','$country','$email')";
if(mysqli_query($conn,$sql))
echo "REGISTERED SUCCESSFULLY";
else
echo "REGISTRATION FAILED";
$conn->close();
?>