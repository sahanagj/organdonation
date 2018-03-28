<?php
$servername = "localhost";
$username = "organdonation";
$password = "donate@123";
$dbname = "donation";
   $conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection failed :" .$conn->connect_error);
}
$temp=$_SESSION['did'];
$sql = "SELECT * FROM donated WHERE donor_id='$temp'";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["donor_id"]. " - Name: " . $row["organ_recived"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>