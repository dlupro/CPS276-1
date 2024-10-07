<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
<?php

require_once "Calculator.php";
$Calculator = new Calculator();

echo $Calculator->calc("/", 10, 0) . "<br>";

echo $Calculator->calc("*", 10, 2) . "<br>";

echo $Calculator->calc("/", 10, 2) . "<br>";

echo $Calculator->calc("-", 10, 2) . "<br>";

echo $Calculator->calc("+", 10, 2) . "<br>";

echo $Calculator->calc("*", 10) . "<br>";

echo $Calculator->calc(10) . "<br>";
?>
</body>
</html>
