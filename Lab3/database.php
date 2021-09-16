<?php
  $dsn = 'mysql:host=localhost;dbname=it1150';
  $username ='root';
  $password = 'Hariharan@26';
  try{
	  $db = new PDO($dsn,$username,$password);
  }catch(PDOException $e){
	  $error_message = $e->getMessage();
	  include('database_error.php');
	  exit();
	  
  }

?>