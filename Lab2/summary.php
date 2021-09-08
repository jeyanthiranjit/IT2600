<?php

$Jeyanthi= $_POST['Jeyanthi'];
$major = $_POST['major'];
$favorite = $_POST['fav_language'];
if(!empty($_POST['vscode']))
$environment1 = $_POST['vscode'];
else 
$environment1 = '';	
if(!empty($_POST['brackets']))
$environment2 = $_POST['brackets'];
else
  $environment2 = '';	
if( !empty($_POST['other']))
$environment3 = $_POST['othername'];
else
	$environment3 = '';
?>
<html>
<head>
    <title>Your Inputs</title>
    
</head>
<body>
    <main>
        <h1>Your Values are:</h1>

<body>
 <main>
		<form action="input.php" method="post">
		   <label><strong>Name:</strong>
		<span><?php echo $Jeyanthi; ?></span></label><br><br>
		
		<label><strong>Major::</strong>
		<span><?php echo $major; ?></span></label><br><br> 
		<label><strong>Favorite web language: </strong>
		<span><?php echo $favorite; ?></span></label><br><br>  
		
		<label><strong>Development Environment:</strong></label>
		<span><?php
		if(!empty($environment1))
			 echo " Visual Studio Code".","." ";
		 if( !empty($environment2))
			 echo "Brackets".","." ";
		 if (!empty($environment3))
			 echo "Others: ".$environment3. " ";
		 if(empty($environment1) && empty($environment2) && empty($environment3))
			 echo "None";
		 ?><br><br>
		 
		 
		
		<label><strong>E-mail: </strong></label>
		<input type="text" name="email"><br><br>
		<input type="submit">
		</form>
 </main>
</body>
</html>