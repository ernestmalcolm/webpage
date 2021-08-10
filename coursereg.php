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

    $coursename = $_POST['coursename'];
    $coursecode = $_POST['coursecode'];
    $description = $_POST['description'];
    $department = $_POST['department'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $teacher = $_POST['teacher'];
    $grade = $_POST['grade'];

    $sql = "INSERT INTO coursereg (coursename, coursecode, description, department, year, semester, teacher, grade) 
    VALUES ('$coursename', '$coursecode', '$description', '$department', '$year', '$semester', '$teacher', '$grade')";
    
    if(mysqli_query($connection, $sql)) {
        echo "Records inserted successfully. <br>";
    } else {
        echo "ERROR: Could not execute entry" .mysqli_error($connection);
    }

    mysqli_close($connection);
?>
    <a style="text-decoration: none;" href="http://localhost/personal/display.php">Click here to view.</a>
    </div>
</body>
</html>
