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

$sql = "SELECT donor_id, name FROM donor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["donor_id"]. " - Name: " . $row["name"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>