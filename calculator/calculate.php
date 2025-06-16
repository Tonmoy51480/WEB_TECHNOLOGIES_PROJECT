<?php
if (isset($_POST['expression'])) {
    $expression = $_POST['expression'];
    // Evaluate the expression (Note: Be very careful with eval() and user input!)
    $result = eval('return ' . $expression . ';');
    echo $result;
}
?>