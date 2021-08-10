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
        <h1>The recorded courses will be displayed below:</h1>
        <table style="font-size: 15px; border: 1px solid;">
            <tr>
                <th style="font-size: 20px">Coursename</th>
                <th style="font-size: 20px">Course Code</th>
                <th style="font-size: 20px">Description</th>
                <th style="font-size: 20px">Department</th>
                <th style="font-size: 20px">Year</th>
                <th style="font-size: 20px">Semester</th>
                <th style="font-size: 20px">Teacher</th>
                <th style="font-size: 20px">Grade</th>
            </tr>
    <?php
    $connection=mysqli_connect("localhost", "root", "", "user");
    if($connection==false){
        die("Connection failed. Reason: ".mysqli_connect_error());
    }

    $sql="SELECT coursename, coursecode, description, department, year, semester, teacher, grade FROM coursereg";
    $result=mysqli_query($connection,$sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_array($result))
        {
            echo "<tr>
            <td>$row[0]</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
            <td>$row[3]</td>
            <td>$row[4]</td>
            <td>$row[5]</td>
            <td>$row[6]</td>
            <td>$row[7]</td>";
            echo "<hr> <br>";
        }
        echo "<br>";
    }
    else{
        echo "No records filled!!";
    }
    mysqli_close($connection);
    ?>
    <a style="text-decoration: none;" href="coursereg.html">Add courses.</a><br>
    <a style="text-decoration: none;" href="course.html">Log out.</a>
</table>
    </div>
</body>
</html>