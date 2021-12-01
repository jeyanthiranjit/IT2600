<!DOCTYPE html>
<html>
<head>
<style>
    * { font-family: Arial, Helvetica, sans-serif; }
    table { max-width: 900px; margin-left: auto; margin-right: auto; border-collapse: collapse; }
    td, th { border: 1px solid teal; padding: 4px; }
    th { background-color: teal; color: white; font-size: 1.1em; font-weight: bold; }
    table tr:first-child td { border: 0px; }
</style>

<title>Final Project - Registration</title>
<meta charset="utf-8" />
  
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  
</head>

<body>
<form action="addcourse-submit.php" method="post">
<p>
Course Id<br>
<input type="text" name="courseid" id="courseid">
</p>
<p>
Title<br>
<input type="text" name="title" id="title">
</p>
<p>
Credit Hrs<br>
<input type="text" name="credits" id="credits">
</p>
<p>
Description<br>
<input type="text" name="desc" id="desc">
</p>
<p>
Prerequisites<br>
<input type="text" name="prereq" id="prereq">
</p>
<p>
    <input type="submit">
</p>
</form>
<script>
            if (isset($_POST['submit'])) {
                echo "submited";
            }
        </script>
</body>
</html>