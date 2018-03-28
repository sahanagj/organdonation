<html>
<head>
<style type="text/css">
#ProfilePage
{
    /* Move it off the top of the page, then centre it horizontally */
    margin: 50px auto;
    width: 635px;

/* For visibility. Delete me */
border: 1px solid red;
}

#LeftCol
{
    /* Move it to the left */
    float: left;

    width: 200px;
    text-align: center;

    /* Move it away from the content */
    margin-right: 20px;

/* For visibility. Delete me */
border: 1px solid brown;
}

#Photo
{
    /* Width and height of photo container */
    width: 200px;
    height: 200px;

/* For visibility. Delete me */
border: 1px solid green;
}

#PhotoOptions
{
    text-align: center;
    width: 200px;

/* For visibility. Delete me */
border: 1px solid brown;
}

#Info
{
    width: 400px;
    text-align: left;

    /* Move it to the right */
    float: right;

/* For visibility. Delete me */
border: 1px solid blue;
}

#Info strong
{
    /* Give it a width */
    display: inline-block;
    width: 100px;

/* For visibility. Delete me */
border: 1px solid orange;
}

#Info span
{
    /* Give it a width */
    display: inline-block;
    width: 250px;

/* For visibility. Delete me */
border: 1px solid purple;
}
</style>
</head>
<body>
<div id="ProfilePage">
    <div id="LeftCol">
        <div id="Photo"></div>
        <div id="ProfileOptions">
        a
        </div>
    </div>

    <div id="Info">
        <p>
            <strong>Name:</strong>
            <span><?php session_start(); echo $_SESSION['name']; ?></span>
        </p>
        <p>
            <strong>Donor ID:</strong>
            <span><?php echo $_SESSION['donor_id']; ?></span>
        </p>
        <p>
            <strong>Date of birth:</strong>
            <span><?php echo $_SESSION['dob']; ?></span>
        </p>
        <p>
            <strong>Gender:</strong>
            <span><?php echo $_SESSION['gender']; ?></span>
        </p>
        <p>
            <strong>Email:</strong>
            <span><?php echo $_SESSION['email']; ?></span>
        </p>
    </div>

    <!-- Needed because other elements inside ProfilePage have floats -->
    <div style="clear:both"></div>
</div>
</body>
<html>