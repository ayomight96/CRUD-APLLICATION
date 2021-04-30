<?php
session_start();
if ($_POST['password'] == $_POST['password1']){
 
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
    
  $password = $_POST['password'];
  $first_name = $_SESSION ['first_name'];
  $last_name = $_SESSION ['last_name'];
  $email = $_SESSION ['email'];


    $sql = "UPDATE `userdata` SET `password`='$password' WHERE first_name='$first_name' && last_name='$last_name' && email='$email'";

    if ($conn->query($sql) === TRUE) {
        print "You have successfully changed your password <br><br>";
        print "<a href=\"signin.php\">Click to return to Sign in page</a>";
    } else {
      echo "Error updating record: " . $conn->error;
     } 
    $conn->close();
    
  } else {
    print "Password mismatch";
    print "<br>";
    print "<br>"; 
    print "<a href=\"reset.html\">Click to return to Password reset page</a>";
  }


?>
