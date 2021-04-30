<?php
//starts session 
session_start();
//checks if the user selected any course at the course index page
if ($_POST){
//includes functions defined in the functions.php page
include "functions.php";
//assigns all the user information in the session to a user variable
$user = $_SESSION;

//prints a welcome message
print "<h1>WELCOME TO THE ADD COURSES PAGE</h1>";
print "<br>";

//this here prints out all the possible courses that a user can select from 
$all_courses = all_courses();

//this here verifies the user courses and assigns it to a variable $courses
$courses = view_current_courses($user);
$verify_array = is_array($courses); 


 if ($courses != 0){
    
        //counts how many courses the user has registered for - 1
        if (count($courses) == 1){
            //creates a variable of all of the array keys corrsponding with the courses
            //the user has already regsitered for amongst the total regitereable courses
            $course_key = array_search($courses[0], $all_courses);

            //removes courses already registered and displays only the course not yet registered for
            unset($all_courses[$course_key]);
        } elseif (count($courses) == 2){
            //creates a variable of all of the array keys corrsponding with the courses
            //the user has already regsitered for amongst the total regitereable courses
            $course_key = array_search($courses[0], $all_courses);
            $course_key1 = array_search($courses[1], $all_courses);
            

            //removes courses already registered and displays only the course not yet registered for
            unset($all_courses[$course_key]);
            unset($all_courses[$course_key1]);
        }

        
//verifies if the user actually has any course registered
if (count($courses) == 1){

                   if (count($_POST) > 2){
                    //prints a message to the user warning him of the amount of courses he/she
                    //can register for
                    print "You can only enroll for 2 more courses<br>";
                    print "The courses you can still enroll for are as follows:<br>";
                    //iterates and displays the courses the user can register for
                    foreach($all_courses as $courses){
                        print "$courses <br>";
                    }
                    // redirects the user to the addindex.php page
                    print "<a href=\"addindex.php\">Click here to return to the Add courses page</a>";

                    //checks if the user selected a course at the add index page
                } elseif (count($_POST) == 1 ){
                    //extracts the key of the course added by the user in the _POST variable
                    $key = array_keys($_POST);
                    //checks if the course selcted exists in the courses the user has already registered for
                    $present = checks_courses_selected_1($_POST[$key[0]], $courses);
                    //if the course exists it redirects the user back to the add course index page
                    if ($present == 1){
                        print "You have selected a course you are already enrolled for<br>";

                        print "You can only enroll for the following courses:<br>";
                    
                        foreach($all_courses as $courses){
                        print "$courses <br>";
                    }
                        print "<br>";
                        print "<a href=\"addindex.php\">Click here to return to the Add courses page</a>"; 
                        //if the user has not registered for any course yet it adds the course up
                    } else {
                        $new_array = array_keys($_POST);
                        $user['course_2'] = $_POST[$new_array[0]];

                        $course_confirm = add_course_2($user);

                    if ($course_confirm == 1){
                        print "Your course has been successfully added!<br><br>";
                        print "kindly sign in again to view your newly added courses<br>";
                        print "<a href=\"signin.php\">Click to return to Sign in page</a>";
                    } else {
                        header("Location: addindex.php");
                        exit();
                    }
                    }
                    

                //checks if the user selected 2 courses at the add index page    
                } elseif (count($_POST) == 2){
                    //extracts the key of the course added by the user in the _POST variable
                    $key = array_keys($_POST);
                    //checks if the course selcted exists in the courses the user has already registered for
                    $present = checks_courses_selected_2($_POST[$key[0]], $_POST[$key[1]], $courses);
                    if ($present == 1){
                        print "You have selected a course you are already enrolled for<br>";

                        print "You can only enroll for the following courses:<br>";
                    
                        foreach($all_courses as $courses){
                        print "$courses <br>";
                    }
                        print "<br>";
                        print "<a href=\"addindex.php\">Click here to return to the Add courses page</a>"; 
                    } else{
                        $new_array = array_keys($_POST);
                        $user['course_2'] = $_POST[$new_array[0]];
                        $user['course_3'] = $_POST[$new_array[1]];

                        $course_confirm = add_course_2_3($user);

                    if ($course_confirm == 1){
                        print "Your courses has been successfully added!<br><br>";
                        print "kindly sign in again to view your newly added courses<br><br>";
                        print "<a href=\"signin.php\">Click to return to Sign in page</a>";
                    
                    } else {
                        header("Location: addindex.php");
                        exit();
                    }
                }
        } 
                
    

    
        } elseif (count($courses) == 2) {
            //checks the amount of courses the user selected at the addindex page
            if (count($_POST) > 1){
                //prints a message to the user warning him of the amount of courses he/she
                //can register for
                print "You can only enroll for 1 more course<br>";
                print "The courses you can still enroll for are as follows:<br>";
                
                foreach($all_courses as $courses){
                    print "$courses <br>";
                }
                print "<a href=\"addindex.php\">Click here to return to the Add courses page</a>";
                
            } elseif (count($_POST) == 1 ){
                $key = array_keys($_POST); 
                $present = checks_courses_selected_1($_POST[$key[0]], $courses);
                    if ($present == 1){
                        print "You have selected a course you are already enrolled for<br>";

                        print "You can only enroll for the following courses:<br>";
                    
                        foreach($all_courses as $courses){
                        print "$courses <br>";
                    }
                        print "<br>";
                        print "<a href=\"addindex.php\">Click here to return to the Add courses page</a>"; 
                    } else {
                        $new_array = array_keys($_POST);
                        $user['course_3'] = $_POST[$new_array[0]];

                        $course_confirm = add_course_3($user);

                    if ($course_confirm == 1){
                        print "Your course has been successfully added!<br><br>";
                        print "kindly sign in again to view your newly added courses<br>";
                        print "<a href=\"signin.php\">Click to return to Sign in page</a>";
                    } else {
                        header("Location: addindex.php");
                        exit();
                    }
            }
        } 
} 
} elseif ($courses == 0) {
    
    if (count($_POST) > 3){
        //prints a message to the user warning him of the amount of courses he/she
                    //can register for
                    print "You can only register for 3 courses<br><br>";
                    print "The courses you can still enroll for are as follows:<br>";
                    
                    foreach($all_courses as $courses){
                        print "$courses <br>";
                    }
                    print "<a href=\"addindex.php\">Click here to return to the Add courses page</a>";
                        
    } elseif (count($_POST) == 3){
        $new_array = array_keys($_POST);
        $user['course_1'] = $_POST[$new_array[0]];
        $user['course_2'] = $_POST[$new_array[1]];
        $user['course_3'] = $_POST[$new_array[2]];

        $course_confirm = add_course_1_2_3($user);
        
        if ($course_confirm == 1){
               print "Your courses has been successfully added!<br><br>";
               print "kindly sign in again to view your newly added courses<br><br>";
               print "<a href=\"signin.php\">Click to return to Sign in page</a>";
        } else {
                header("Location: addindex.php");
                exit();
        }
    } elseif (count($_POST) == 2){
        $new_array = array_keys($_POST);
                    $user['course_1'] = $_POST[$new_array[0]];
                    $user['course_2'] = $_POST[$new_array[1]];

                    $course_confirm = add_course_1_2($user);

                    if ($course_confirm == 1){
                        print "Your courses has been successfully added!<br><br>";
                        print "kindly sign in again to view your newly added courses<br><br>";
                        print "<a href=\"signin.php\">Click to return to Sign in page</a>";
                    } else {
                        header("Location: addindex.php");
                        exit();
                    }
    } elseif (count($_POST) == 1){
        $new_array = array_keys($_POST);
                    $user['course_1'] = $_POST[$new_array[0]];
                    
                    $course_confirm = add_course_1($user);

                    if ($course_confirm == 1){
                        print "Your courses has been successfully added!<br><br>";
                        print "kindly sign in again to view your newly added courses<br><br>";
                        print "<a href=\"signin.php\">Click to return to Sign in page</a>";
                    } else {
                        header("Location: addindex.php");
                        exit();
                    }
    }
}

} else {
   
header("Location: addindex.php");
exit();
}
 

?>
