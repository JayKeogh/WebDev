<!--
    StudentName:   Jay Keogh
    Id:            C00300208
    Lab:           3
    Task:          1
-->

<?php
// Include the database connection file
include 'db.inc1.php';

// Set the default timezone to UTC
date_default_timezone_set("UTC");

// Display the default values received from the form
echo "The default values sent down are: <br>";

// Display first name and surname from the POST data
echo "First Name is: " . $_POST['firstname'] . "<br>";
echo "Surname is: " . $_POST['surname'] . "<br>";

// Convert the date of birth from the POST request into a date object
$date = date_create($_POST['dob']);

// Display formatted date (Fix: Use "Y" for four-digit year instead of "y" for two-digit year)
echo "Date of Birth is: " . date_format($date, "d/m/Y") . "<br>";

// Prepare the SQL query to insert form data into the database
$sql = "INSERT INTO persons (firstname, lastname, DOB)
VALUES ('{$_POST['firstname']}', '{$_POST['surname']}', '{$_POST['dob']}')";

// Execute the SQL query and check if it was successful
if (!mysqli_query($con, $sql)) 
{
    // If there's an error in the SQL query, display the error message and stop execution
    die("An Error in the SQL Query: " . mysqli_error($con));  
}

// Display a confirmation message after inserting the record
echo "<br>A record has been added for " . $_POST['firstname'] . " " . $_POST['surname'] . ".";

// Close the database connection
mysqli_close($con);
?>

<!-- Form to return to the insert page -->
<form action="insert.html" method="POST">
    <br>
    <input type="submit" value="Return to Insert Page"/>
</form>
