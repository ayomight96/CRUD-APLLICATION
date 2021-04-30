<?php session_start(); 

include "functions.php";
$user = $_SESSION;

$courses = view_current_courses($user);
$verify_array = is_array($courses);

print "<h1>WELCOME TO MY COURSES PAGE</h1>";
print "<br>";


if ($verify_array == 1){
    if (count($courses) == 1){
        print "<h2>You are currently enrolled in: ";
        print count($courses);
        print " course</h2><br>";
        print "\"";
        print $courses[0];
        print "\"<br><br>";
        print "You can enroll for 2 more courses<br><br>";
        print "<a href=\"addindex.php\">Click here to enrol for more courses</a><br><br>";
        print "<a href=\"delete.php\">Click here to delete course</a>";
    } elseif (count($courses) == 2 && $courses[0] != null && $courses[1] != null){
        print "<h2>You are currently enrolled in: ";
        print count($courses);
        print " courses</h2><br>";
        print "\"";
        print $courses[0];
        print "\"<br>";
        print "\"";
        print $courses[1];
        print "\"<br><br>"; 
        print "You can enroll for 1 more course<br><br>";
        print "<a href=\"addindex.php\">Click here to enrol for more courses</a><br><br>";
        print "<a href=\"delete.php\">Click here to delete course</a>";   
    } elseif(count($courses) == 3 && $courses[0] != null && $courses[1] != 0 && $courses[2] != 0){
        
        print "<h2>You are currently enrolled in: ";
        print count($courses);
        print " courses</h2><br>";
        print "\"";
        print $courses[0];
        print "\"<br>";
        print "\"";
        print $courses[1];
        print "\"";   
        print "\"<br>";
        print "\"";
        print $courses[2];
        print "\"<br><br>";  
        print "<h4>You can't enroll for any more course</h4><br><br>";
        print "<a href=\"delete.php\">Click here to delete course</a>";
    }
    
}  else {
    Print "You have no Registered Course at the moment <br><br>";
    print "<a href=\"addindex.php\">Click here to enrol for a course</a>";
    }

?>
