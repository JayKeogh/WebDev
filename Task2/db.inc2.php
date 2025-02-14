<?php 
    $hostname = "localhost";
    $username = "C00300208";
    $password = "labuser51";

    $dbname = "MYDBC00300208";

    $con = mysqli_connect($hostname, $username, $password, $dbname);

    if(!$con)
        {
        die ("Failed to connect to MySQL: " . mysqli_connect_error());
        }
?>