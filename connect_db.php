<?php
$host="localhost";
$user="id13127830_laxmimolu";
$password="/WGyA8<2@!0G=T##";
$con=mysqli_connect($host,$user,$password);

if (!$con) {
    error_log("Failed to connect to MySQL: " . mysqli_error($con));
    die('Internal server error');
}

// 2. Select a database to use 
$db = mysqli_select_db($con, "id13127830_pharmacy");
if (!$db) {
    error_log("Database selection failed: " . mysqli_error($con));
    die('Internal server error');
}
?>