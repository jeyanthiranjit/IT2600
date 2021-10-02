<!DOCTYPE html>
<html>
<head>
<title>Investment Calculator</title>
<style>
table { vertical-align: middle}
    td, th { text-align: right }
    td {padding:0.5px; width: 80px; }
    tr:nth-child(even) {background-color: #e5e5e5; }
    tr {border-bottom:1px solid #cccccc; }
    .year {width:10px;}
</style>
</head>
<body>
    <h1>Simple Investment Calculator</h1>
    <?php
    setlocale(LC_MONETARY,"en_US");
    // TODO: Study the following example reading in the value for the initial amount. Use this example to read in the other values in the next steps.
    $newamount = $_POST['amount'];
 $investamount = $newamount;
    // TODO: Read in the "rate" from the post. Assign it to $rate. 
    $rate = $_POST['rate'];

    // TODO: Read in the number of years "years". Create a new variable and assign the "years" value to it.
$years = $_POST['years'];

    // TODO: Read in "extra" from the post. Create a new variable and assign the "extra" value to it.
$extra = $_POST['extra'];
    // TODO: Read in "addamount" from the post. Create a new variable and assign the "addamount" value to it.
	$addamount = $_POST['addamount'];
    ?>
    <h3>Investment Details</h3>
    <?php
    // TODO: Display the values that you read in from above: amount, rate, years, addamount, and extra.
	 echo  "<b>Initial amount: </b> $newamount<br>";
	 echo  "<b>Interest Rate: </b> $rate <br>";
	 echo "<b>Number of Years: </b> $years<br>";
	 echo "<b>Addional amount: </b> $addamount<br>";
	 echo "<b>Extra: </b> $extra<br>";
    ?>
    <h3>Annual Schedule</h3>
    <table  cellpadding="0" cellspacing="0" width="100%" style="border: 1px;" rules="none">
        <tr>
            <th>Year</th>
            <th>Start Amount</th>
            <th>Interest</th>
            <th>End Amount</th>
			<th>Extra</th>
			<th>New amount</th>
        </tr>
    <?php
    // TODO: modify the loop, so it only loops for the number of years invested. 
	$interestTotal =0;
	$extratotal =0;
    for ($x=0; $x<$years; $x++) {
         $startamount = $newamount;
        $interest = $newamount * ($rate/100);
		$interestTotal = $interestTotal +  $interest;
        // TODO: if "addamount" is equal to "Yes", add the amount from "extra" to $newamount.
		
			
        $newamount = $newamount + $interest;
		$endamount = $newamount;
		if($addamount == "Yes"){
			
			$newamount = $newamount + $extra;
			$extratotal = $extratotal + $extra;
		} 
	
    ?>
    <tr>
        <td class="year"><?php echo ($x+1); ?>
        <td><?php printf ( "$%.02f" , $startamount ); ?></td>
		<td><?php printf ( "$%.02f" , $interest ); ?></td>
		<td><?php printf ( "$%.02f" , $endamount ); ?></td>
		
        <!-- TODO: if "addamount is equal to "Yes", display two additional columns: the extra amount and the $newamount after adding the extra. -->
	
		
			<td><?php
			if($addamount == "Yes"){
			printf ( "$%.02f" , $extra );} ?></td>
			<td><?php
			if($addamount == "Yes") 
				printf ( "$%.02f" , $newamount ); ?></td>
		 </tr>
		
		 <tr><td>
    <?php
   }
   
    // TODO: For 2 extra credit points: Add a summary that includes amount invested, total interest earned, total extra amount added, and the final amount.
	echo "<b>Investment summary</b><br>";
	
	echo "<b>Amount Invested: </b> ";
	printf( "$%.02f<br>", $investamount);
	 echo  "<b>Interest earned: </b>";
	 printf ( "$%.02f<br>" ,$interest );
	 echo "<b>Total extra amount: </b>";
	  printf ( "$%.02f<br>" , $extratotal );
	 echo "<b>final amount: </b> ";
	 printf ( "$%.02f<br> " , $newamount );
	

    ?></td></tr></table>
	
</body>

</html>