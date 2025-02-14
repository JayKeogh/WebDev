<?php
// Start a new session or resume the existing one
session_start();

// Include the database connection file
include 'db.inc.php';

// Construct SQL query to select a person based on the provided person ID
// There's an issue here: `$_POST('personiid')` should be `$_POST['personid']`
$sql = "SELECT * FROM persons WHERE personid = " . $_POST['personid'];

// Execute the SQL query and check if it was successful
if (!$result = mysqli_query($con, $sql)) 
{
    // If there's an error, display it and stop the script execution
    die('Error in querying the database: ' . mysqli_error($con));
}

// Get the number of rows affected by the query
$rowcount = mysqli_affected_rows($con);

// There's an issue here: `$_SESSION('personid')` should be `$_SESSION['personid']`
$_SESSION['personid'] = $_POST['personid'];

if ($rowcount == 1) 
{
    // Fetch the result row as an associative array
    $row = mysqli_fetch_array($result);

    // There's an issue here: `$row('columnName')` should be `$row['columnName']`
    $_SESSION['personid'] = $row['personId'];
    $_SESSION['firstname'] = $row['firstName'];
    $_SESSION['lastname'] = $row['lastName'];
    $_SESSION['dob'] = $row['DOB'];
} 
else if ($rowcount == 0) 
{
    // If no record is found, unset session variables related to person details
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['dob']);
}

// Close the database connection
mysqli_close($con);

// Redirect back to the calling form with session variables set, if a record was found
header('Location: view.html.php');

// Alternatively, redirect using JavaScript (commented out)
// echo "<script>window.location.href = 'view.html.php'</script>";
?>
