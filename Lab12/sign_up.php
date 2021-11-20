<!DOCTYPE html>
<html>
<head>
<title>sign up form</title>
<meta charset="utf-8" />
  
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<style>
    * { font-family: Arial, Helvetica, sans-serif; }
    table { max-width: 900px; margin-left: auto; margin-right: auto; border-collapse: collapse; }
    td, th { border: 1px solid teal; padding: 4px; }
    
	input { width: 200px; }
input.operand { width: 50px; }
* { font-family: Arial; }
input:invalid {
  border: 2px solid red;
}

input:invalid:required {
  background-image: linear-gradient(to right, pink, Red);
}

input:valid {
  border: 2px solid black;
}
</style>
<script type="text/javascript">
function validate()
{
 var error="";
 var name = document.getElementById( "fname" );
 if( name.value == "" )
 {
  error = " You Have To Write Your Name. ";
  document.getElementById( "error_para" ).innerHTML = error;
  return false;
 }
var name2 = document.getElementById( "lname" );
 if( name2.value == "" )
 {
  error = " You Have To Write Your Name. ";
  document.getElementById( "error_para" ).innerHTML = error;
  return false;
 }
 var email = document.getElementById( "email" );
 if( email.value == "" || email.value.indexOf( "@" ) == -1 )
 {
  error = " You Have To Write Valid Email Address. ";
  document.getElementById( "error_para" ).innerHTML = error;
  return false;
 }

 var password = document.getElementById( "passwd" );
 if( password.value == "" || password.value >= 8 )
 {
  error = " Password Must Be More Than Or Equal To 8 Digits. ";
  document.getElementById( "error_para" ).innerHTML = error;
  return false;
 }

 else
 {
  return true;
 }
}

</script>
</head>
<title>Sign up - Lab12</title>
<meta charset="utf-8" />
<body>
<form method="post" action="Signup-submit.php" id="formID" onsubmit="return validate();">
<h2>Enter the following details</h2>


<table>
    <tr>
        <td>First Name </td><td><input type="text" name="fname" id="fname"  required></td>
	</tr>
	 <tr>
         <td>Last Name </td><td><input type="text" name="lname" id="lname" required></td>
	</tr>
	<tr>
        <td>User ID</td><td><input type="text" name="uID" id="uID"  required></td>
	</tr>
	<tr>
		<td>email address</td><td><input type="email" name="email" id="email" required></td>
	</tr>
	<tr>
	    <td>Password </td><td><input type="password" name="passwd" id="passwd"  required></td>
	</tr>
	<p id="error_para"></p>
</table>
<p>
    <input type="submit" value="submit form" id="submit_form">
</p>
</form>


<script>  
        </script>
</body>
</html>