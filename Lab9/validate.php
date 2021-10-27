<!DOCTYPE html>
<html>
<head>
<title>Validation</title>
 <meta charset="utf-8" />
<style>
  * { font-family:Arial, Helvetica, sans-serif; }
    input { width:220px; }
</style>
</head>
<body>
   <h1>Jeyanthi Meenakshisundaram - Lab 9 Validation</h1>
   <?php
    setlocale(LC_MONETARY,"en_US");
    // TODO: Study the following example reading in the value for the initial amount. Use this example to read in the other values in the next steps.
    $PWD = $_POST['pwd'];

    $Weather = $_POST['weather'];
	$FavSeason = $_POST['favseason'];
	$oper1 = $_POST['operand1'];
	$oper2 = $_POST['operand2'];
	
	$pattern1 = "/!/";
	$pattern2 = "/^/";

  $Sunny = "/sunny/i";
	$Cold = "/cold/i";
	$raining = "/Raining/i";
	
	$Fall = "/fall/i";
	$Summer = "/summer/i";
	$winter = "/winter/i";
	
	?>
	<h4>Password Validation:</h4>
	
	
	<?php
	$var1 = preg_match($pattern1, $PWD);
	$var2 = preg_match($pattern2, $PWD);
	
	
	 if($var2 ===1 && $var1 ===1){
		echo "Contains invalid characters ! , ^ ";
	 }else if($var2 ===1) {
		 echo "Contains invalid character  ^ ";
	 }		 else if($var1 ===1) {
		echo "Contains invalid character  ! ";
	
	 } else {
		 echo "Password accepted";
	 }
  ?>
  <h3>Weather Prediction and validation </h3>
  <?php 
    $var3 = preg_match($Sunny, $Weather);
	if($var3===1){
		echo "<br />Sunny - Wear sunscreen";
	}
	$var4 = preg_match($Cold, $Weather);
	if($var4===1){
		echo "<br />Cold - Wear a hat";
	}
	$var5 = preg_match($raining, $Weather);
	if($var5===1){
		echo "<br />Raining - Bring an umbrella";
	}
  
  ?>
  <h3>Count on each weather:</h3>
  <?php 
     $countfall = preg_match_all($Fall, $FavSeason);
	 echo "<br />Vote count for Fall: ".$countfall;
	 
	 $countsummer = preg_match_all($Summer, $FavSeason);
	 echo "<br />Vote count for Summer: ".$countsummer;
	 
	 $countwinter = preg_match_all($winter, $FavSeason);
	 echo "<br />Vote count for winter: ".$countwinter;
	 
	 
	 
  ?>
  <h3>Division validation:</h3>
  <?php
function divide($a, $b) {
	  if($b <=0) {
		  throw new Exception('Division by Zero.');
	  }
	  return $a/$b;
}
       
	   try {
		   echo divide($oper1, $oper2);
	   }catch(Exception $e) {
	      
		      echo "<br />caught Exception: ".$e->getMessage() ."\n";
	   }
	  
	?>
	
	
	
	