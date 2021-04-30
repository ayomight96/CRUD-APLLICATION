<?php
session_start();
include "functions.php";

$user = make_array_signup();

$user_exist = verify_user_exists_signup($user);

if ($user_exist != 0){
  header("Location: signin.php");
  exit();
} else {

$_SESSION = session_userdata($user);

if ($_POST['password1'] == $_POST['password']){
  print "<h2>Welcome to the Homepage, $user[0]</h2>";
  print "<br>";
  print "<br>";
  print "<br>";
  print "Your details are as follows:";
  print "<table>\n";

  print "<tr><td>Your First Name:</td><td>$user[0]</td></tr>";
  print "<tr><td>Your Last Name:</td><td>$user[1]</td></tr>";
  print "<tr><td>Your Email:</td><td>$user[2]</td></tr>";
  print "<tr><td><a href=\"courses.html\">My Courses</a></td><td><a href=\"reset.html\">Reset Password</a></td></tr>";
  print "<tr><td></td><td></td></tr>";
  print "<tr><td></td><td></td></tr>";
  print "<tr><td><a href=\"signin.php\">Sign Out</a></td></tr>";                
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

} else {
    print "Your password does not match<br>";
    print "<a href=\"signup.html\">kindly click here to return to the sign up page </a>";
}

}
