<?php
session_start();
include "functions.php";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zuritraining";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
  $first_name = $_SESSION ['first_name'];
  $last_name = $_SESSION ['last_name'];
  $email = $_SESSION ['email'];
  
  $sql = "UPDATE `userdata` SET `course_1`=null, `course_2`=null, `course_3`=null WHERE first_name='$first_name' && last_name='$last_name' && email='$email'";
  

if ($conn->query($sql) === TRUE) {
  echo "Courses Successfully deleted<br>";
  print "kindly sign in a again to view your dashboard<br>";
  print "<a href=\"signin.php\">Click to return to Sign in page</a>";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
