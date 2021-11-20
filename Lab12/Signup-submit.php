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
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
</head>

<h1>New records addition to Users table in IT2600 DB</h1>
				<?php 
				
		$FN = isset($_POST['fname']) ? $_POST['fname'] : '';
$LN =  isset($_POST['lname']) ? $_POST['lname'] : '';
$UID =  isset($_POST['uID']) ? $_POST['uID'] : '';
$EML =  isset($_POST['email']) ? $_POST['email'] : '';
$PWD =  isset($_POST['passwd']) ? $_POST['passwd'] : '';
$PWDHash = md5($PWD);
		
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
if(isset($_POST['fname'])){
$sql = "INSERT INTO users ( first_name, Last_Name, user_id, email, password)
VALUES ('$FN', '$LN','$UID', '$EML', '$PWDHash')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully with following values:";
  

 echo "<br />".$FN."<br />";
  echo "<br />".$LN. "<br />";
  echo "<br />". $UID . "<br />";
 echo "<br />".$EML. "<br />";
echo "<br />".$PWD."<br />";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
else{
	?><script>
	alert("data null");
	</script>
	<?php
}
?>
<table>

<tr><th>Sl_No</th><th>First_Name</th><th>Last_Name</th><th>user Id</th><th>Email</th><th>Password</th></tr>
<?php
$sql = "SELECT * FROM users ";
		$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["first_name"]. "</td><td>" . $row["Last_Name"] . "</td><td>" . $row["user_id"] . "</td><td>".$row["email"]. "</td><td>" . $row["password"]. "</td></tr>";
  }
} else {
  echo "0 results";
}
mysqli_close($conn);
?>
<h3>Click to <a href="./index.html" class="logout-button">go to main page</a></h3>
<script>

</script>