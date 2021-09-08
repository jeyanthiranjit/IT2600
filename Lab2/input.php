<?php 
    //set default value of variables for initial page load
    if (!isset($jeyanthi)) { $jeyanthi = ''; } 
    if (!isset($major)) { $major = ''; } 
    if (!isset($favorite)) { $favorite = 'None'; } 
?> 
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
    <h1>Lab 2 Input form</h1>
	  <h2>Created By Jeyanthi</h2>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>

<form action="summary.php" method="post">
  <p> Name<br>
  <input type="input" id="name" name="Jeyanthi" placeholder="jeyanthi" value="<?php echo htmlspecialchars($jeyanthi); ?>">
  </p>
  <p>
  Major<br>
  <input type="input" id="major" name="major" placeholder="Major" value="<?php echo htmlspecialchars($major); ?>">
  </p>
  <p>
  Favorite Web Language<br>
  <input type="radio" id="html" name="fav_language" value="HTML" >
  <label for="html">HTML</label><br>
  <input type="radio" id="css" name="fav_language" value="CSS">
  <label for="css">CSS</label><br>
  <input type="radio" id="javascript" name="fav_language" value="JavaScript">
  <label for="javascript">JavaScript</label><br>
  <input type="radio" id="PHP" name="fav_language" value="PHP">
  <label for="PHP">PHP</label>
  </p>
  <p>
  Development Evironment<br>
  <input type="checkbox" id="ide1" name="vscode" value="vscode">
  <label for="vehicle1"> Visual Studio Code</label><br>
  <input type="checkbox" id="ide2" name="brackets" value="brackets">
  <label for="vehicle2"> Brackets</label><br>
  <input type="checkbox" id="ide3" name="other" value="other">
  <label for="vehicle3"> Other</label> 
  <input type="text" id="othername" name="othername">
  </p>
  <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Submit"><br>
        </div>

</form> 
 </main>
</body>
</html>