<!DOCTYPE html>
<html>
<head>
    <style>
        * { font-family: Arial, Helvetica, sans-serif; }
        table { max-width: 900px; margin-left: auto; margin-right: auto; border-collapse: collapse; }
        td, th { border: 1px solid teal; padding: 4px; }
        th { background-color: teal; color: white; font-size: 1.1em; font-weight: bold; }
        table tr:first-child td { border: 0px; font-size: 1.2em; }
        select { font-size: 1.1em; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" 
	integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<title>Final Project - Registration</title>
<meta charset="utf-8" />
  
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  
</head>

<h1>New records addition to Courses DB</h1>
				<?php 
				
$servername = "localhost";
$username = "root";
$password = "Hariharan@26";
$dbname = "it1150";

$CourseID = $_POST['course_id'];
$Crn = $_POST['crn'];
$Semester = $_POST['semester'];
$Room = $_POST['room'];
$Day = $_POST['days'];
$Times = $_POST['times'];


 //$SortBy = 'courseid';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}          
$sql = "INSERT INTO sections (course_id, crn, semester, room, days, times)
VALUES ('$CourseID', '$Crn', '$Semester','$Room','$Day', '$Times')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully with following values:";
  

 echo "<br />".$CourseID;
 echo "<br />".$Crn;
echo "<br />".$Semester;
echo "<br />".$Room;
echo "<br />".$Day;
echo "<br />".$Times."<br />";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
mysqli_close($conn);
?>
