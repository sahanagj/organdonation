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
//echo "connected succesfully.";
    $email=$_POST['email']; 
    $password=$_POST['password']; 
    $sql = "SELECT * FROM donor WHERE email='$email'and password='$password'";
$result = $conn->query($sql);
    if ($result->num_rows==1) 
    {
		$_SESSION['email'] = $_POST['email'];
		while($row = $result->fetch_assoc()){
        echo "donor_id ".$row["donor_id"]."<br>name ".$row["name"]." <br>dob: " . $row["dob"]. "<br>email " . $row["email"]."<br>gender ".$row["gender"];
		$id=$row["donor_id"];
		echo $id;
		}
    }
	else 
    {
		echo "login failed try again";
	}
	$sql="SELECT * FROM guardian WHERE donor_id='$id'";
	$result = $conn->query($sql);
	if ($result->num_rows==1) 
    {
        while($row = $result->fetch_assoc())
		{
			echo "guardian details";
			echo "<br>guardian name  ".$row["gname"]."<br> Relatioship  ".$row["relationship"]."<br>";
			
		}
	}
	else{
		echo "guardian details not available";
	}
?>