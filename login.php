<?php
$uid=$_POST['uid'];
$pid=$_POST['passid'];
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

$uid=base64_encode($uid);
$pid=base64_encode($pid);
$sql = "SELECT * FROM user_details WHERE userid='$uid' AND password='$pid'";
$result = $conn->query($sql);

if (!(empty($result)) && $result->num_rows > 0) {
  // output data of each row
?>
  <!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>GFG User Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
</head>
  
<body>
    <section>
       
        <table>
            <tr>
                <th>Userid</th>
                <th>Password</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Country</th>
                <th>Email</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo base64_decode($rows['userid']);?></td>
                <td><?php echo base64_decode($rows['password']);?></td>
                <td><?php echo $rows['fname'];?></td>
                <td><?php echo $rows['lname'];?></td>
                <td><?php echo $rows['gender'];?></td>
                <td><?php echo $rows['country'];?></td>
                <td><?php echo $rows['email'];?></td>
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
</body>
  
</html>
<?php
} 
else {
  echo "No rows selected";
}
$conn->close();
?>
