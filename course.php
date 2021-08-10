<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered courses</title>
    <link rel="stylesheet" href="mystyles.css">
    <link rel="stylesheet" href="formstyles.css">
</head>
<body>
    <div class="topnav">
        <a href="home.html">Home</a>
        <a href="aboutme.html">About me</a>
        <a href="logsign.html">Register</a>
        <a href="course.html" class="active">Courses</a>
        <a href="cv.html">CV</a>
        <a href="contacts.html">Contacts</a>
    </div><br><br><br>
    <div style="font-size: 20px; background-color: rgba(128,128,128,0.7); margin: 10px; border-radius: 10px;">
<?php

    $connection = mysqli_connect("localhost", "root", "", "user");

    if ($connection === false) {
        die("ERROR: Could not connect" .mysqli_connect_error());
    }

    $uname = $_POST['username'];
    $pass = $_POST['password'];
    
    $sql = "SELECT username FROM usert WHERE username = '$uname'";
    $result = $connection->query($sql);

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $sql = "SELECT password FROM usert WHERE password = '$pass'";
        $result = $connection->query($sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            echo "successful login";
            header("Location: ./coursereg.html");
        } 
        else {
            echo "Wrong password!";
        }
    } else {
        echo "Username does not exist";
    }
     
?>
</div>
</body>
</html>