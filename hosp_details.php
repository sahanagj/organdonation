<?php
session_start();
$servername = "localhost";
$username = "organdonation";
$password = "donate@123";
$dbname = "donation";
   $conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection failed :" .$conn->connect_error);
}
$temp=$_SESSION['license'];
$sql = "SELECT * FROM hospital WHERE license_num = '$temp'";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["license_num"]. " - Name: " . $row["hop_name"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>