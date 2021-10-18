<!DOCTYPE html>
<html>
<head>
<title>Array functionalities</title>
<style>
  * { font-family:Arial, Helvetica, sans-serif; }
    input { width:220px; }
	   
	   td, th {
		   border-bottom: 2px solid #bbbbbb;
			border-right:2px solid #bbbbbb;	  
			text-align: right
    }
    td {
		border 2px solid #bbbbbb; 
				 }
	
    tr:nth-child(odd) {background-color: #e5e5e5; }
    tr {border:2px solid #bbbbbb; 
		 }
	table {border : 4px solid #bbbbbb;}
</style>
</head>
<body>
   <h1>Jeyanthi Meenakshisundaram Lab 7 </h1>
   <h4>Server side languages are:</h4>
   <?php  
     $prog_lang = array('PHP', 'ASP.NET', 'Ruby', 'Java', 'Scala', 'JavaScript', 'Python');
	 sort($prog_lang);
	 echo '<ul>';
	 for($x=0;$x < count($prog_lang);$x++){
		 echo  "<li>$prog_lang[$x]<br /></li>";
	 }
	 echo '</ul>';
   ?>
   <h4> Server side languages sorted by Mostly used language:</h4>
   <table>
        <tr>
            <th>Programming Language</th>
            <th>Percentage of usage</th>           
        </tr>
   <?php 
      $prog_lang2 = array('Python' => 1.4, 'ASP.NET' => 8.3,'Ruby' => 5.2,'PHP'=> 78.9,'Java'=> 3.6,'Scala'=> 2.0);
	  arsort($prog_lang2);
	 	  foreach($prog_lang2 as $lang => $percent) {
		  ?>
		<tr>
		  <td><?php  echo "$lang"; ?></td>
          <td><?php	echo  "$percent%"; ?><td>
		 </tr>
		 <?php 
	  }
	
	
   ?>
   <?php 
    session_start();
      $_SESSION['fullname'] = 'Jeyanthi Meenakshisundaram';
	  $_SESSION['courseid'] = 'IT-2600';
	  
	 
setcookie("cookie[favoperatingsystem]", "Microsoft");
setcookie("cookie[favlanguage]", "Java Script");
   ?>
    </table>
	<?php echo '<br />';?>
  <a href="https://localhost/Lab7/lab7favorites.php">go to Lab7favourites page</a> 
  
</body>
</html>