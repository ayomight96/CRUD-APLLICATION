<?php
//this function turns all the info enetred during signup into an array
function make_array_signup(){
    //this makes sure that the user actually made an input
    if ($_POST['first_name'] &&$_POST['last_name'] && $_POST['email'] && $_POST['password']){
        //this assigns user inputs to an array
        $user = [$_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']];
        //this returns the array
        return $user;
    }
}

function make_array_signin(){
  //this checks that the user actually makes an input
  if ($_POST['email'] && $_POST['password']){
    //asigns the input into an array
    $user = [$_POST['email'], $_POST['password']];
    //returns the array
    return $user;
}
}

function session_userdata($user){
  if (count($user) == 4){
    $_SESSION['first_name'] = $user[0];
    $_SESSION['last_name'] = $user[1];
    $_SESSION['email'] = $user[2];

    return $_SESSION;
  } else{
    $_SESSION['first_name'] = $user[0];
    $_SESSION['last_name'] = $user[1];
    $_SESSION['email'] = $user[2];
    $_SESSION['course_1'] = $user[3];
    $_SESSION['course_2'] = $user[4];
    $_SESSION['course_3'] = $user[5];
  
    return $_SESSION;
  }
    
    

 
}

function store_file($user){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zuritraining";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    $sql = "INSERT INTO `userdata` (`first_name`, `last_name`, `email`, `password`)
    VALUES ('$user[0]', '$user[1]', '$user[2]', '$user[3]')";

    
    
    if ($conn->query($sql) === TRUE) {
      return 1;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
  
  }

  function verify_user_exists_signup($user){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zuritraining";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
      $sql = "SELECT `first_name`, `last_name`, `email`, `course_1`, `course_2`, `course_3` FROM `userdata` WHERE first_name = '$user[0]' && 
      last_name = '$user[1]' && email = '$user[2]' && password = '$user[3]'";

      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        $row = $result->fetch_array(MYSQLI_NUM);
        $user = $row; 
        return $user;
        } else {
        return 0;
      }
      $conn->close();
    }
    
    function reset_password($password, $user){
      if ($password[0] == $password[1]){
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zuritraining";
  
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
  
        $sql = "UPDATE `userdata` SET `password`='$password[0]' WHERE first_name='$user[0]' && last_name='$user[1]' && email='$user[2]'";
  
        if ($conn->query($sql) === TRUE) {
          return 1;
        } else {
          echo "Error updating record: " . $conn->error;
          header("Location: reset.html");
          exit();
        }
        $conn->close();
      }
      
    }
    
    function verify_user_courses($user){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "zuritraining";
      
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $password = $user['password'];
      $email = $user ['email'];
      $sql = "SELECT `course_1`, `course_2`, `course_3`  FROM `userdata` WHERE email='$email' && password='$password'";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        // output data of each row into the array row
        $row = $result->fetch_array(MYSQLI_NUM);
          $user = $row; 
          return $user;    
        
      } else {
        return 0;
    }
  }

  function add_course_2($user){
    $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zuritraining";
  
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
  
        $sql = "UPDATE `userdata` SET `course_2` = '$user[course_2]' WHERE first_name='$user[first_name]' && last_name='$user[last_name]' && email='$user[email]'";
  
        if ($conn->query($sql) === TRUE) {
          return 1;
        } else {
          echo "Error updating record: " . $conn->error;
          header("Location: reset.html");
          exit();
        }
        $conn->close();
      }

      function add_course_3($user){
        $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "zuritraining";
      
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
      
            $sql = "UPDATE `userdata` SET `course_3` = '$user[course_3]' WHERE first_name='$user[first_name]' && last_name='$user[last_name]' && email='$user[email]'";
      
            if ($conn->query($sql) === TRUE) {
              return 1;
            } else {
              echo "Error updating record: " . $conn->error;
              header("Location: reset.html");
              exit();
            }
            $conn->close();
          }

          function add_course_1($user){
            $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "zuritraining";
          
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
          
                $sql = "UPDATE `userdata` SET `course_1` = '$user[course_1]' WHERE first_name='$user[first_name]' && last_name='$user[last_name]' && email='$user[email]'";
          
                if ($conn->query($sql) === TRUE) {
                  return 1;
                } else {
                  echo "Error updating record: " . $conn->error;
                  header("Location: reset.html");
                  exit();
                }
                $conn->close();
              }

              function add_course_1_2($user){
                $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "zuritraining";
              
                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                    }
              
                    $sql = "UPDATE `userdata` SET `course_1` = '$user[course_1]', `course_2` = '$user[course_2]' WHERE first_name='$user[first_name]' && last_name='$user[last_name]' && email='$user[email]'";
              
                    if ($conn->query($sql) === TRUE) {
                      return 1;
                    } else {
                      echo "Error updating record: " . $conn->error;
                      header("Location: reset.html");
                      exit();
                    }
                    $conn->close();
                  }

                  function add_course_2_3($user){
                    $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "zuritraining";
                  
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                        }
                  
                        $sql = "UPDATE `userdata` SET `course_2` = '$user[course_2]', `course_3` = '$user[course_3]' WHERE first_name='$user[first_name]' && last_name='$user[last_name]' && email='$user[email]'";
                  
                        if ($conn->query($sql) === TRUE) {
                          return 1;
                        } else {
                          echo "Error updating record: " . $conn->error;
                          header("Location: reset.html");
                          exit();
                        }
                        $conn->close();
                      }

                      function add_course_1_2_3($user){
                        $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "zuritraining";
                      
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                              die("Connection failed: " . $conn->connect_error);
                            }
                      
                            $sql = "UPDATE `userdata` SET `course_1` = '$user[course_1]', `course_2` = '$user[course_2]', `course_3` = '$user[course_3]' WHERE first_name='$user[first_name]' && last_name='$user[last_name]' && email='$user[email]'";
                      
                            if ($conn->query($sql) === TRUE) {
                              return 1;
                            } else {
                              echo "Error updating record: " . $conn->error;
                              header("Location: reset.html");
                              exit();
                            }
                            $conn->close();
                          }
    
  
    function verify_user_exists_signin($user){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zuritraining";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT `first_name`, `last_name`, `email`, `course_1`, `course_2`, `course_3`  FROM `userdata` WHERE email='$user[0]' && password='$user[1]'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row into the array row
          $row = $result->fetch_array(MYSQLI_NUM);
            $user = $row; 
            return $user;    
          
        } else {
          return 0;
        }
        $conn->close();
      }

      function view_current_courses($user){
        if ($user['course_1'] != null && $user['course_2'] == null && $user['course_3'] == null){
          $courses = [$user['course_1']];
          return $courses;
        } elseif ($user['course_1'] != null && $user['course_2'] != null && $user['course_3'] == null){
          $courses = [$user['course_1'], $user['course_2']];
          return $courses;
        } elseif ($user['course_1'] != null && $user['course_2'] != null && $user['course_3'] != null){
          $courses = [$user['course_1'], $user['course_2'], $user['course_3']];
          return $courses;
        } else {
          return 0;
        }
      }

      function all_courses(){
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "zuritraining";
              
              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              
              $sql = "SELECT `course_1`, `course_2`, `course_3`, `course_4`, `course_5` FROM `courses`";
              $result = $conn->query($sql);
              
              if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_array(MYSQLI_NUM);
                $courses = $row; 
                             
                return $courses;
              } else {
                return 0;
              }
              $conn->close();
      }
      //this function returns an array of courses that the user has not added yet
      //it takes in the array of courses athe user has added and the array of total number of courses
      function view_available_courses($courses, $courses1){
          //this checks if the number of courses the user has taken is up to 1
          // and deletes it from the total number of courses finally returning the courses left
        if (count($courses) == 1){
          $course_key = array_search($courses[0], $courses1);
          unset($courses1[$course_key]);
          return $courses1;
          //this checks if the number of courses the user has taken is up to 2
          // and deletes it from the total number of courses finally returning the courses left
       
      } elseif (count($courses) == 2){
        $course_key = array_search($courses[0], $courses1);
        $course_key1 = array_search($courses[1], $courses1);
          unset($courses1[$course_key], $courses1[$course_key1]);
          return $courses1;
      
         //this checks if the number of courses the user has taken is up to 3
        // and deletes it from the total number of courses finally returning the courses left
      } elseif (count($courses) == 3){
        $course_key = array_search($courses[0], $courses1);
        $course_key1 = array_search($courses[1], $courses1);
        $course_key2 = array_search($courses[2], $courses1);
          unset($courses1[$course_key], $courses1[$course_key1], $courses1[$course_key2]);
          return $courses1;
          //this checks if the user has not taken up any course
          // and returns all the courses in the total course
      } else {
        return $courses1;
      }
      
      
      }


      //this function determines the number of courses a user can still add. 
//It takes in the coures the user already has registered as a an array variable
//and also takes in the total number of courses available for registration
function course_num_add($courses, $courses1){
    //this calls the available courses function and assigns its value to a variable 
    $num = view_available_courses($courses, $courses1);
        //this checks if there are 5 courses left unchosen then returns
        // that the user can still take 3 more courses 
        if (count($num) == 5) {
            return 3;
          }
        //this checks if there are 4 courses left unchosen then returns
        // that the user can still take 2 more courses 
        elseif (count($num) == 4){
        return 2;
        //this checks if there are 3 courses left unchosen then returns
        // that the user can still take 1 more course 
      } elseif (count($num) == 3){
        return 1;
         //this checks if there are 2 courses left unchosen then returns
        // that the user can not take in anymore course 
      } elseif(count($num) == 2){
        return 0;
      }
    
  function check_if_course_exist($courses){


  }
  }
  ?>