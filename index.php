<?php
session_start();
include "functions.php";

$user = make_array_signup();
$user_exist = verify_user_exists_signup($user);
$verify = is_array($user_exist);
print $verify;
if ($verify == 1){
  header("Location: signin.php");
  exit();
} else {

$_SESSION = session_userdata($user_exist);

if ($_POST['password1'] == $user[3]){
  print "<h2>Welcome to the Homepage, $user[0]</h2>";
  print "<br>";
  print "<br>";
  print "<br>";
  print "Your details are as follows:";
  print "<table>\n";

  print "<tr><td>Your First Name:</td><td>$user[0]</td></tr>";
  print "<tr><td>Your Last Name:</td><td>$user[1]</td></tr>";
  print "<tr><td>Your Email:</td><td>$user[2]</td></tr>";
  print "</table>\n";
  print "<br>";
  print "<br>";

  $confirm = store_file($user);
  
  if ($confirm == 1){
    ob_start();
      print "You have been successfully registered!";
      ob_end_clean();
  } else {
    print "Your account was not registered";
    header("Location: signup.html");
    exit();
  }

}

}
?>
<html>
    <body>
    <table> 
    <form>
            <tr><td><a href="courses.html">My Courses</a></td><td><a href="reset.html">Reset Password</a></td></tr>
            <tr><td></td><td></td></tr>
            <tr><td><a href="signin.php">Sign Out</a></td></tr>"      
    </form>
    </table>
    </body>
    </html>

