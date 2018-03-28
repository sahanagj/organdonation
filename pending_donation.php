<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 60%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}
.container1{
padding-left:90%;
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #474e5d;
    padding-top: 50px;
	padding-left:100p;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 60%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}

.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<body>
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
$sql = "SELECT doctor_id,donor_id FROM donation WHERE license_num = '$temp'";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["doctor_id"]. " - id: " . $row["donor_id"]."<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<div class="container1"><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">New Donation</button></div>
<div class="container1"><button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Complete Donation</button></div>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="http://localhost/wtlab/donation_details.php" method="post">
    <div class="container">
	<center><h3>Enter Donation Details</h3></center>
      <hr>
	  
      <label><b>Donor ID</b></label></br>
      <input type="text" placeholder="Enter ID" name="donorid" required>
	  </br><label><b>Doctor ID</b></label></br>
      <input type="text" placeholder="Enter id" name="doctorid" required>
      </br><label><b>Number of organs Recived </b></label></br>
      <input type="text" placeholder="Enter Number of organs" name="nor" required>
      </br><label><b>Number of tissues recived</b></label></br>
      <input type="text" placeholder="Enter Number of tissue" name="ntr" required>
	  </br><label><b>Date</b></label></br>
      <input type="date" name="date" required>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">submit</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="http://localhost/wtlab/donation_details.php" method="post">
    <div class="container">
	<center><h3>Enter Donation Details</h3></center>
      <hr>
	  
      <label><b>Donor ID</b></label></br>
      <input type="text" placeholder="Enter ID" name="donorid" required>
	  </br><label><b>organ donated</b></label></br>
      <input type="text" placeholder="Enter organ" name="org" required>
      </br><label><b>recipient_id</b></label></br>
      <input type="text" placeholder="enter id" name="rid" required>
	  </br><label><b>name</b></label></br>
      <input type="text" placeholder="enter name" name="rname" required>
	  </br><label><b>age</b></label></br>
      <input type="text" placeholder="enter age" name="age" required>
	  </br><label><b>contact_num</b></label></br>
      <input type="text" placeholder="phn_number" name="cnum" required>
	  </br><label><b>date</b></label></br>
      <input type="date" name="rdate" required>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">submit</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>