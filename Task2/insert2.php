
<?php
// Include the database connection file
include 'db.inc.php';

// Set the default timezone to UTC
date_default_timezone_set("UTC");

// Display the default values received from the form
echo "The default values sent down are: <br>";

// ISSUE: `$_POST('firstname')` should be `$_POST['firstname']` (Incorrect use of parentheses)
echo "First Name is: " . $_POST['firstname'] . "<br>";
echo "Surname is: " . $_POST['surname'] . "<br>";

// Convert the date of birth from the POST request into a date object
$date = date_create($_POST['dob']);

// Display formatted date (Fix: Use "Y" for four-digit year instead of "y" for two-digit year)
echo "Date of Birth is: " . date_format($date, "d/m/Y") . "<br>";

// ISSUE: Incorrect syntax for SQL query (Missing curly braces and incorrect `$_POST` usage)
$sql = "INSERT INTO persons (firstname, lastname, DOB)
VALUES ('{$_POST['firstname']}', '{$_POST['surname']}', '{$_POST['dob']}')";

// Execute the SQL query and check if it was successful
if (!mysqli_query($con, $sql)) 
{
    // If there's an error in the SQL query, display the error message and stop execution
    die("An Error in the SQL Query: " . mysqli_error($con));  
}

// ISSUE: `$_POST('firstname')` should be `$_POST['firstname']`
echo "<br>A record has been added for " . $_POST['firstname'] . " " . $_POST['surname'] . ".";

// Close the database connection
mysqli_close($con);
?>

<!-- Form to return to the insert page -->
<form action="insert.html" method="POST">
    <br>
    <input type="submit" value="Return to Insert Page"/>
</form>
