<?php
session_start();
//calls the functions in function.php
include 'functions.php';

$user = make_array_signin();

$verify = verify_user_exists_signin($user);

if ($verify == 0){
    print "Your email or password is incorrect";
    print "<br>";
    print "<br>"; 
    print "<a href=\"signin.php\">Click to return to Sign in page</a>";

} else{

        $_SESSION = session_userdata($verify);



        $verify = verify_user_exists_signin($user);
        print "<h2>Welcome to the Homepage, $verify[0]</h2>";
        print "<br>";
        print "<br>";
        print "<br>";
        print "Your details are as follows:";
        print "<table>\n";

        print "<tr><td>Your First Name:</td><td>$verify[0]</td></tr>";
        print "<tr><td>Your Last Name:</td><td>$verify[1]</td></tr>";
        print "<tr><td>Your Email:</td><td>$verify[2]</td></tr>";
        print "<tr><td></td><td></td></tr>";
        print "<tr><td><a href=\"courses.php\">My Courses</a></td><td><a href=\"reset.html\">Reset Password</a></td></tr>";
        print "<tr><td></td><td></td></tr>";
        print "<tr><td><a href=\"signin.php\">Sign Out</a></td></tr>";
        print "</table>\n";
        print "<br>";
        print "<br>";
        

} 
?>
