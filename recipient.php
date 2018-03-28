<?php
session_start();
$servername = "localhost";
$username = "organdonation";
$password = "donate@123";
$dbname = "donation";
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection failed :" . $conn->connect_error);
}
$donor_id=$_POST['donorid'];
$recipient_id=$_POST['rid'];
$organ=$_POST['org'];
$name=$_POST['rname'];
$date=$_POST['date'];
$age=$_POST['age'];
$contact_num=$_POST['cnum'];
$sql="SELECT num_of_organs_donated FROM donation WHERE donor_id='$donor_id'";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $num=$row["num_of_organs_donated"]
    }
 }
$conn->close();

$sql="INSERT INTO recipient(recipient_id,name,age,contact_num)
VALUES('$recipient_id','$name','$age','$contact_num')";
if($conn->query($sql) === TRUE) {
    //echo "values inserted";
} else {
    echo "Error inserting values: " . $conn->error;
}
$sql="INSERT INTO donated(donor_id,recipient_id,organ_recived,date)
VALUES('$donor_id','$recipient_id','$organ','$date')";
if($conn->query($sql) === TRUE) {
	$sql = "SELECT COUNT(organ_recived) FROM donated";
$query = mysql_query($sql);
$result = mysql_num_rows($query);
if($result == $num)
{
   $_SESSION['did']=$donor_id;
   header('location: http://localhost/wtlab/succesful_donation.php');
}
    header('location: http://localhost/wtlab/pending_donation.php');//echo "values inserted";
} else {
    echo "Error inserting values: " . $conn->error;
}

?>