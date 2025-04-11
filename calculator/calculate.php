<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = isset($_POST["num1"]) ? floatval($_POST["num1"]) : 0;
    $num2 = isset($_POST["num2"]) ? floatval($_POST["num2"]) : 0;
    $operation = $_POST["operation"];
    $result = "Invalid operation";

    switch ($operation) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            $result = ($num2 != 0) ? $num1 / $num2 : "Cannot divide by zero";
            break;
        case 'mod':
            $result = ($num2 != 0) ? $num1 % $num2 : "Cannot mod by zero";
            break;
        case 'power':
            $result = pow($num1, $num2);
            break;
    }

    echo $result;
}
?>
