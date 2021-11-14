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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<h1>New records addition to Courses DB</h1>
				<?php 
				
$servername = "localhost";
$username = "root";
$password = "Hariharan@26";
$dbname = "it1150";

$CourseID = $_POST['courseid'];
$Title = $_POST['title'];
$CreditHRS = $_POST['credits'];
$Description = $_POST['desc'];
$Prereq = $_POST['prereq'];


 //$SortBy = 'courseid';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}          
$sql = "INSERT INTO courses (course_id, title, credit_hrs, description, prerequisites)
VALUES ('$CourseID', '$Title', '$CreditHRS','$Description','$Prereq')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully with following values:";
  

 echo "<br />".$CourseID;
 echo "<br />".$Title;
echo "<br />".$CreditHRS;
echo "<br />".$Description;
echo "<br />".$Prereq."<br />";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<table>

<tr><th>Course Id</th><th>Title</th><th>Credit Hrs</th><th>Description</th><th>Prerequisites</th></tr>
<?php
$sql = "SELECT * FROM courses where course_id = '$CourseID'";
		$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["course_id"]. "</td><td>" . $row["title"]. "</td>" . 
         "<td>" . $row["credit_hrs"]. "</td><td>" . $row["description"]. "</td><td>" .$row["prerequisites"]. "</td></tr>";
  }
} else {
  echo "0 results";
}
mysqli_close($conn);
?>
<script>

function reload(){
	var sel = document.getElementById('sortcourses').value;
	//document.write(sel);
	//alert(sel);
    window.location.href='http://localhost/lab11/courses.php?sort=' + sel;
}
	 
</script>