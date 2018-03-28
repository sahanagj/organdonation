<?php
$servername = "localhost";
$username = "organdonation";
$password = "donate@123";
$dbname = "donation";
//$donorname = $_POST['donor_name'];
$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error)
{
	die("connection failed :" . $conn->connect_error);
}
echo "connected succesfully.";
$dname=$_POST['dname'];
$demail=$_POST['demail'];
$dage=$_POST['dage'];
$specialization=$_POST['spcl'];
$did=$_POST['did'];
$sql="INSERT INTO doctor(dname,demail,specialization,dage,doctor_id,license_num)
VALUES('$dname','$demail','$specialization','$dage','$did','34544')";
if($conn->query($sql) === TRUE) {
    //echo "values inserted";
	header('location:http://localhost/wtlab/doctor_information.php');
} else {
    echo "Error inserting values: " . $conn->error;
}