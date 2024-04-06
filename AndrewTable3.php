<!DOCTYPE html>
<html>

<!-- Benjamin Andrew -->
<!-- CSD 440 -->
<!-- 26 March 2024 -->

<head>
<title>Andrew's PHP Table</title>
</head>
<body>

<!-- Call the file with the function -->
<?php require 'AndrewFunctionRef.php'?>

<!-- Start of the table -->
<table border="1"><caption>Random Number Generation with imported function!</caption>
<?php 
//Define number of rows and columns
$rows=8;
$cols=8;

//Nested loops to generate a random number through each block of the table.
for ($i = 1; $i <= $rows; $i++) {
    ?><tr><?php 
    for ($j = 1; $j <= $cols; $j++) {
        //Generate two random numbers to put into the function
        $rando1 = rand(0, 49);
        $rando2 = rand(0, 49);
        
        //Call the function from the external file
        $result = addIt($rando1,$rando2);
        
        //Display the result
        ?><td><?php echo "{$result}"?></td><?php 
    }
    ?></tr><?php 
}
?>
</table>
</body>
</html>
