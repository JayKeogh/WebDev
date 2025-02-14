<!--
    StudentName:   Jay Keogh
    Id:            C00300208
    Lab:           3
    Task:          2
-->

<?php 
    // Define database connection parameters
    $hostname = "localhost"; // Hostname of the database server
    $username = "C00300208"; // Username for database authentication
    $password = "labuser51"; // Password for database authentication
    $dbname = "MYDBC00300208"; // Name of the database to connect to

    // Establish a connection to the MySQL database
    $con = mysqli_connect($hostname, $username, $password, $dbname);

    // Check if the connection was successful
    if(!$con) 
    {
        // If connection fails, display an error message and terminate the script
        die ("Failed to connect to MySQL: " . mysqli_connect_error());
    }
?>
