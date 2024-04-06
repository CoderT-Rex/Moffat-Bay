<!DOCTYPE html>
<html>

<!-- Benjamin Andrew -->
<!-- CSD 440 -->
<!-- 26 March 2024 -->

<head>
<title>Andrew's PHP Table</title>
</head>
<body>
<table border="1"><caption>Random Number Generation!</caption>
<?php 
//Define number of rows and columns
$rows=8;
$cols=8;

//Nested loops to generate a random number through each block of the table.
for ($i = 1; $i <= $rows; $i++) {

    ?><tr>
    <?php for ($j = 1; $j <= $cols; $j++) {
        //Generate a random number between 0 and 99
        $rando = rand(0, 99);
        ?><td><?php echo "{$rando}";?></td><?php 
    }
    ?></tr><?php 
}
?>
</table>
</body>
</html>



