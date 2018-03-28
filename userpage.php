<?php
Session_start();
?>
<html>
<head>
<title>userpage</title>
</head>
<body>
<table>
<label>Donor details</label>
<tr>
<th>name</th>
<th>donor id</th>
<th>date of birth</th>
<th>gender</th>
<th>email</th>
</tr>
<tr>
<td><?php echo $_SESSION['name']; ?></td>
<td><?php echo $_SESSION['donor_id']; ?></td>
<td><?php echo $_SESSION['dob']; ?></td>
<td><?php echo $_SESSION['gender']; ?></td>
<td><?php echo $_SESSION['email']; ?></td>
</tr>
</body>
</html>