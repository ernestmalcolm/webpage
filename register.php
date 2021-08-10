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
        <a href="index.html">Home</a>
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

    $fname = $_POST['firstname'];
    $mname = $_POST['middlename'];
    $sname = $_POST['surname'];
    $uname = $_POST['username'];
    $pass = $_POST['password1'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];
    
    $cv = $_FILES['cv']['name'];
    $fileLocation = $_FILES['cv']['tmp_name'];
    $folder = ".\cvfolder";

    if (move_uploaded_file($fileLocation, $folder.$cv)) {
    $sql = "INSERT INTO usert (firstname, middlename, surname, username, password, email, facebook, twitter, instagram,cv) 
    VALUES ('$fname', '$mname', '$sname', '$uname', '$pass', '$email','$facebook', '$twitter', '$instagram', '$cv')";
    }
    if(mysqli_query($connection,$sql)) {
        echo "Records inserted successfully";
    } else {
        echo "ERROR: Could not execute entry" .mysqli_error($connection);
    }

    mysqli_close($connection);
?>
    <br><br>
    <a style="text-decoration: underline; color: rgb(0,0,0);" href="course.html">Click here to go back to login page.</a>
    </div>
</body>
</html>
