<?php
// Get values pass from in login.php file
    $username= $_POST['username'];
    $password= $_POST['password'];

// to prevent mysql injection
    $username =stripcslashes($username);
    $password =stripcslashes($password);

    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);

// connect tot the server and select database
    mysql_connect("localhost","root","");
    mysql_select_db("login");

// Query the databse for user
    $result = mysql_query("select * from users where username = '$username' and password='$password'") or die("Failed to query updates".mysql_error());
    $row = mysql_fetch_array($result);
    if ($row['username']==$username && $row['password']== $password) {
        echo "Login Success!! welcome".$row['username'];
    }else {
        echo "Failed Login";
    }
?>
