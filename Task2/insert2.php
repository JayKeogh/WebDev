<!--
    StudentName:   Jay Keogh
    Id:            C00300208
    Lab:           3
    Task:          2
-->

<?php
// Include the database connection file to establish a connection
include 'db.inc2.php';

// Set the default timezone to UTC
date_default_timezone_set("UTC");

// Display the values received from the form
echo "The values received from the form are: <br>";

// Retrieve and display user input from the POST request
echo "First Name: " . $_POST['firstname'] . "<br>";
echo "Last Name: " . $_POST['surname'] . "<br>";
echo "Email: " . $_POST['email'] . "<br>";
echo "Phone Number: " . $_POST['phone'] . "<br>";

// Convert the date of birth from the form into a date object
$date = date_create($_POST['dob']);

// Display the formatted date (Uses "Y" for a four-digit year)
echo "Date of Birth: " . date_format($date, "d/m/Y") . "<br>";

// Construct the SQL query to insert the user's data into the 'persons' table
$sql = "INSERT INTO persons (firstname, lastname, DOB, email, phone)
        VALUES ('{$_POST['firstname']}', '{$_POST['surname']}', '{$_POST['dob']}', '{$_POST['email']}', '{$_POST['phone']}')";

// Execute the SQL query and check for errors
if (!mysqli_query($con, $sql)) 
{
    // Display an error message and terminate the script if the query fails
    die("An error occurred while inserting data: " . mysqli_error($con));  
}

// Display a success message confirming the record insertion
echo "<br>A record has been successfully added for " . $_POST['firstname'] . " " . $_POST['surname'] . ".";

// Close the database connection
mysqli_close($con);
?>

<!-- Form to return to the insert page -->
<form action="insert.html" method="POST">
    <br>
    <input type="submit" value="Return to Insert Page"/>
</form>
