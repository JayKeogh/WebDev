<!--
    StudentName:   Jay Keogh
    Id:            C00300208
    Lab:           3
    Task:          2
-->

<?php
// Start a new session or resume the existing one
session_start();

// Include the database connection file
include 'db.inc.php';

// Retrieve the person ID from the form submission
$personid = $_POST['personid'];

// Construct SQL query to select a person based on the provided person ID
$sql = "SELECT * FROM persons WHERE personid = $personid";

// Execute the SQL query
$result = mysqli_query($con, $sql);

// Get the number of rows affected by the query
$rowcount = mysqli_affected_rows($con);

// Store the searched person ID in the session
$_SESSION['personid'] = $personid;

if ($rowcount == 1) 
{
    // Fetch the result row as an associative array
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Store retrieved person details in session variables
    $_SESSION['personid'] = $row['personId'];
    $_SESSION['firstname'] = $row['firstName'];
    $_SESSION['lastname'] = $row['lastName'];
    $_SESSION['dob'] = $row['DOB'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['phone'] = $row['phone'];
} 
else if ($rowcount == 0) 
{
    // If no record is found, clear session variables related to person details
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['dob']);
    unset($_SESSION['email']);
    unset($_SESSION['phone']);
}

// Close the database connection
mysqli_close($con);

// Redirect back to the calling form with session variables set if a record was found
header('Location: view.html.php');
?>
