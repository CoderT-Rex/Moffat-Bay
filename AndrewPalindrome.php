<!DOCTYPE html>
<html>
<head>
<!-- Benjamin Andrew -->
<!-- CSD 440 -->
<!-- 1 April 2024 -->
<Title>Andrew Palindrome Test</Title>
	<!-- Adding background color and lettering color to reduce eye strain -->
	<style>
    	body {
    	background-color: #00008B;
    	color: white;
    	font-family: Arial, sans-serif;
    	}
	</style>
</head>
<body>
<?php
//Create a function that will compare the first and last character of the string
function Reverse($palString) {
    $init = 0;
    $len = strlen($palString) - 1;
    $test = 0;
    
    //While statement that actually compares the first and last character, then moves inwards per iteration
    while ($len > $init){
        if ($palString[$init] != $palString[$len]){
            $test = 1;
            break;
        }
        $init++;
        $len--;
    }
    //displays whether the test detected a Palindrome or not.
    echo "<br />";
    if ($test == 0){
        echo $palString." is a Palindrome.<br /><br />";
    } else {
        echo $palString." is not a Palindrome.<br /><br />";
    }
}


//Six test strings, 3 Palindromes and 3 non-Palindromes
$test1 = "madam";
	echo "Reverse of $test1 is " .strrev($test1);
Reverse($test1);

$test2 = "diver";
echo "Reverse of $test2 is " .strrev($test2);
Reverse($test2);

$test3 = "racecar";
echo "Reverse of $test3 is " .strrev($test3);
Reverse($test3);

$test4 = "dancer";
echo "Reverse of $test4 is " .strrev($test4);
Reverse($test4);

$test5 = "aibohphobia";
echo "Reverse of $test5 is " .strrev($test5);
Reverse($test5);

$test6 = "spiders";
echo "Reverse of $test6 is " .strrev($test6);
Reverse($test6);
?>
</body>
</html>