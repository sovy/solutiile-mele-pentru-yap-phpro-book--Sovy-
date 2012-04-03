<?php
/**
 * We will calculate the minimum number of bills(1,5,10,50,100,200,500)
 * for a given amount of money;
 * $amount - will keep the sum of money; 
 */
$message = NULL;
$error = NULL;
const ERROR_DATA = 1;
$bills = array( 500, 200, 100, 50, 10, 5, 1);
if(isset($_GET['submit'])){
	if(isset($_GET['amount']) && (int)$_GET['amount']) {
		$amount = (int)$_GET['amount'];
		foreach($bills as $bill) {
			$counter_bill = 0;
			while($amount >= $bill) {
				$amount -= $bill;
				++$counter_bill;
			}
			$message[$bill] = $counter_bill;
			if(0 === $amount) {
				break;
			}
		}
	}
	else {
		$error = ERROR_DATA;	
	}	
}


if(NULL !== $error) {
	if(ERROR_DATA === $error) {
		echo "Data error!";
	}
}
else {		
	echo 'The minimum number of bills for ', $_GET['amount'],'$ is: <ul>';
	foreach($message as $type_bill => $number_bills) {
		if(0 !== $number_bills) {
			echo '<li>', $number_bills,' bills of ', $type_bill, '</li>';
		}
	}

}
?>
<form method="GET">
<label for="amount">SUM:</label>
<input type="text" name="amount" id="amount" />
<input type="submit" name ="submit" value="Send" />
</form>
