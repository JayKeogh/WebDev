<!--
    StudentName:   Jay Keogh
    Id:            C00300208
    Lab:           3
    Task:          2
-->

<?php
// Include the database connection file
include 'db.inc2.php';

// Set the default timezone to UTC
date_default_timezone_set("UTC");

// Query to retrieve person details based on the person ID
$sql = "SELECT * FROM persons WHERE personid = " . $_POST['personid'];

// Execute the query and store the result
$result = mysqli_query($con, $sql);

// Get the number of affected rows (i.e., matching records)
$rowcount = mysqli_affected_rows($con);

// Check if exactly one record was found
if ($rowcount == 1) {
    echo "<br>The details of the selected person are:<br><br>";

    // Fetch the record as an associative array
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // Display the details of the selected person
    echo "The person ID is: " . $_POST['personid'] . "<br><br>";
    echo "First Name is: " . $row['firstName'] . "<br>";
    echo "Last Name is: " . $row['lastName'] . "<br>";
    echo "Email is : " . $row['email'] . "<br>";
    echo "Phone number is : " . $row['phone'] . "<br>";

    // Convert the date of birth to a readable format
    $date = date_create($row['dob']);
    echo "Date of Birth is: " . date_format($date, "d/m/Y") . "<br>";
}
// If no matching records were found
else if ($rowcount == 0) {
    echo "No matching records found.";
}

// Close the database connection
mysqli_close($con);
?>

<!-- Form to return to the previous page -->
<form action="view.html" method="POST">
    <br>
    <input type="submit" value="Return to select page"/>
</form>
