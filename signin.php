<?php session_start() ?>

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
<!DOCTYPE html>
<html>
<body style="background-color:rgb(211, 230, 233);">
    <h1>LOG IN PAGE</h1>
<form id = "signin" method="post" action="welcome.php">
        <label>Email: </label><input name = "email" type = "email" placeholder = "Email Address" required><br><br>
        <label>Password: </label><input name = "password" type = "password" placeholder = "Password" pattern = ".{3,}" required><br><br>
        <button type = "submit" class = "submit" name = "signin">Sign in</button><br><br>
        </form>
</body>
</html>
