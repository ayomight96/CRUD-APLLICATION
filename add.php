<?php 
session_start();

if ($_POST){

include "functions.php";
$user = $_SESSION;

//this here verifies the user courses and assigns it to a variable $courses
$courses = verify_user_courses($user);
$user['course_1'] = $courses[0];
$user['course_2'] = $courses[1];
$user['course_3'] = $courses[2];

function checks_courses_selected($user, $user1){

}

//this here checks if the user is enrolled for any course and returns an array containing the 
//courses enrolled for or returns zero in the case where no courses are registered for
$current_courses = view_current_courses($user);

//here the $verify_array variable takes in the verification of whether the $current_courses is an array
$verify_array = is_array($current_courses);

//this here prints out all the possible courses that a user can select from 
$all_courses = all_courses();

//prints a welcome message
print "<h1>WELCOME TO THE ADD COURSES PAGE</h1>";
print "<br>";

//verifies if the user actually has any course registered
if ($verify_array == 1){

    //counts how many courses the user has registered for - 1
        if (count($current_courses) == 1){
            //creates a variable of all of the array keys corrsponding with the courses
            //the user has already regsitered for amongst the total regitereable courses
            $course_key = array_search($current_courses[0], $all_courses);

            //removes courses already registered and displays only the course not yet registered for
            unset($all_courses[$course_key]);
                //checks the amount of courses the user selected at the addindex page
                function checks_courses_selected_1($user, $user1){
                    $present = array_search($user, $user1);
                    if ($present != false){
                        return 1;
                    }
                }

                function checks_courses_selected_2($user, $user1){
                    $present = array_search($user[0], $user1);
                    $present1 = array_search($user[1], $user1);
                    if ($present != false && $present1 != false){
                        return 1;
                    }
                }


                if (count($_POST) > 2){
                    //prints a message to the user warning him of the amount of courses he/she
                    //can register for
                    print "You can only enroll for 2 more courses<br>";
                    print "The courses you can still enroll for are as follows:<br>";
                    
                    foreach($all_courses as $courses){
                        print "$courses <br>";
                    }
                    print "<a href=\"addindex.php\">Click here to return to the Add courses page</a>";
                } elseif (count($_POST) == 1 ){
                    $present = checks_courses_selected_1($_POST, $all_courses);
                    if ($present == 1){
                        print "you have selected a course you are already enrolled for<br>";
                        print "<a href=\"addindex.php\">Click here to return to the Add courses page</a>"; 
                    } else {
                        $new_array = array_keys($_POST);
                    $_SESSION['course_2'] = $_POST[$new_array[0]];

                    $course_confirm = add_course_2($_SESSION);

                    if ($course_confirm == 1){
                        print "Your course has been successfully added!<br>";
                        print "kindly sign in a agin to view your newly added courses<br>";
                        print "<a href=\"signin.php\">Click to return to Sign in page</a>";
                    } else {
                        header("Location: addindex.php");
                        exit();
                    }
                    }
                    

                    
                } elseif (count($_POST) == 2){
                    $present1 = checks_courses_selected_1($_POST, $all_courses);
                    if ($present1 == 1){
                        print "you have selected one or more course you are already enrolled for<br>";
                        print "<a href=\"addindex.php\">Click here to return to the Add courses page</a>"; 
                    } else{
                        $new_array = array_keys($_POST);
                    $_SESSION['course_2'] = $_POST[$new_array[0]];
                    $_SESSION['course_3'] = $_POST[$new_array[1]];

                    $course_confirm = add_course_2_3($_SESSION);

                    if ($course_confirm == 1){
                        print "Your courses has been successfully added!<br>";
                        print "kindly sign in a agin to view your newly added courses<br>";
                        print "<a href=\"signin.php\">Click to return to Sign in page</a>";
                    
                    } else {
                        header("Location: addindex.php");
                        exit();
                    }
                }
        } elseif (count($current_courses) == 2){
            //creates a variable of all of the array keys corrsponding with the courses
            //the user has already regsitered for amongst the total regitereable courses
            $course_key = array_search($current_courses[0], $all_courses);
            $course_key1 = array_search($current_courses[1], $all_courses);
            

            //removes courses already registered and displays only the course not yet registered for
            unset($all_courses[$course_key]);
            unset($all_courses[$course_key1]);
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
                    $new_array = array_keys($_POST);
                    $_SESSION['course_3'] = $_POST[$new_array[0]];

                    $course_confirm = add_course_3($_SESSION);

                    if ($course_confirm == 1){
                        print "Your course has been successfully added!<br>";
                        print "kindly sign in a agin to view your newly added courses<br>";
                        print "<a href=\"signin.php\">Click to return to Sign in page</a>";
                    } else {
                        header("Location: addindex.php");
                        exit();
                    }
                }
    

    
        } 
} else {
    
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
        $_SESSION['course_1'] = $_POST[$new_array[0]];
        $_SESSION['course_2'] = $_POST[$new_array[1]];
        $_SESSION['course_3'] = $_POST[$new_array[2]];

        $course_confirm = add_course_1_2_3($_SESSION);
        
        if ($course_confirm == 1){
               print "Your courses has been successfully added!<br>";
               print "kindly sign in a agin to view your newly added courses<br>";
               print "<a href=\"signin.php\">Click to return to Sign in page</a>";
        } else {
                header("Location: addindex.php");
                exit();
        }
    } elseif (count($_POST) == 2){
        $new_array = array_keys($_POST);
                    $_SESSION['course_1'] = $_POST[$new_array[0]];
                    $_SESSION['course_2'] = $_POST[$new_array[1]];

                    $course_confirm = add_course_1_2($_SESSION);

                    if ($course_confirm == 1){
                        print "Your courses has been successfully added!<br>";
                        print "kindly sign in a agin to view your newly added courses<br>";
                        print "<a href=\"signin.php\">Click to return to Sign in page</a>";
                    } else {
                        header("Location: addindex.php");
                        exit();
                    }
    } elseif (count($_POST) == 1){
        $new_array = array_keys($_POST);
                    $_SESSION['course_1'] = $_POST[$new_array[0]];
                    
                    $course_confirm = add_course_1($_SESSION);

                    if ($course_confirm == 1){
                        print "Your courses has been successfully added!";
                        print "kindly sign in a agin to view your newly added courses<br>";
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
}
?>
