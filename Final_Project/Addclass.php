<!DOCTYPE html>
<html>
<head>
<style>

</style>

<script>
</script>

<title>Final Project - Add a class</title>
<meta charset="utf-8" />

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  
  <h1>New records addition to Registration table in IT2600 DB</h1>
				<?php 
				
		$crn = isset($_GET['crn']) ? $_GET['crn'] : '';
$semes =  isset($_GET['semester']) ? $_GET['semester'] : '';
$userid = isset($_GET['userId']) ? $_GET['userId'] : '';
		
		
		
$servername = "localhost";
$username = "root";
$password = "Hariharan@26";

$dbname = "it2600";



 //$SortBy = 'courseid';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}          

$sql = "INSERT INTO registrations ( user_id, crn, semester)
VALUES ('$userid','$crn', '$semes')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully with following values:";
  
 echo "<br />CRN - ". "$crn";
 
  echo "<br />User ID - "."$userid";
  echo "<br />Semester - " . "$semes";
 
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

  </head>
  
  </html>
