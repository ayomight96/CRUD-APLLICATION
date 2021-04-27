<?php session_start(); ?>

<style type="text/css">
    input {
        background-color: rgb(250, 248, 248);
        border-style: solid;
        border-color: #999;
        border: 0px 4px 0px 4px;
        padding: 3px 6px 3px 6px;
        margin: 10px 0;
    }
    input:focus {
        border-style: solid;
        border-color: rgb(233, 227, 227);
    }
    body {
    text-align: center;
}
form {
    display: inline-block;
}
</style>
<html>
<body style="background-color:rgb(211, 230, 233);">
        
        <form id = "signup" method="post" action="add.php"><br><br><br><br><br><br><br><br>
        
        <input type="checkbox" id="php" name="php" value="php">
        <label for="php"> PHP COURSE</label>
        <input type="checkbox" id="java" name="java" value="java">
        <label for="java"> JAVA COURSE</label>
        <input type="checkbox" id="java_script" name="java_script" value="java_script">
        <label for="java_script"> JAVASCRIPT COURSE</label>
        <input type="checkbox" id="graphics" name="graphics" value="graphics">
        <label for="graphics"> GRAPHICS DESIGN COURSE</label>
        <input type="checkbox" id="python" name="python" value="python">
        <label for="python"> PYTHON COURSE</label><br><br><br><br><br><br>

        <button style="height:40px;width:200px" type = "submit">Enroll</button>
</form>   
</body>
</html>

