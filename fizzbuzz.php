<?php
/**
(1) Write a program that prints the numbers from 1 to 100. But for multiples of three print
 "Fizz" instead of the number and for the multiples of five print "Buzz". For numbers which are
 multiples of both three and five print "FizzBuzz". 
*/

function fizzbuzz($n) {
	if ($n == 100) {
		return 100;
	} else {
		if (($n % 3 == 0) && ($n % 5 == 0)) {
			echo 'FizzBuzz';
		} elseif (($n % 3 == 0) && ($n % 5 != 0)) {
			echo 'Fizz';
		} elseif (($n % 3 != 0) && ($n % 5 == 0)) {
			echo 'Buzz';
		} else {
			echo $n;
		}
		echo "<br />\n";
		return fizzbuzz(++$n);
	}
}

echo fizzbuzz(1);
