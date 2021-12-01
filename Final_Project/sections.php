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

				<?php 
				
$servername = "localhost";
$username = "root";
$password = "Hariharan@26";
$dbname = "it2600";

//$SortBy = 'courseid';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}          




$sql1 = "SELECT * FROM sections ORDER BY semester";
$result = mysqli_query($conn, $sql1);
//document.write("in if block");

         
?>
<body>
<h3>Welcome to Final Project !</h3>

<h2>Available courses on semester vise</h2>

<table>
<tr>
<td colspan="2" align="left">
<a href="addsection.php"><i class="fas fa-plus-circle"></i> Add a section</a>
</td>

</tr>
<tr><th>CRN</th><th>Course Id</th><th>Semester</th><th>Room</th><th>Days</th><th>Times</th></tr>
<?php
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["crn"]. "</td><td>" . $row["course_id"]. "</td>" . 
         "<td>" . $row["semester"]. "</td><td>" . $row["room"]. "</td><td>" . $row["days"]. "</td><td>" . $row["times"]. "</td></tr>";
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