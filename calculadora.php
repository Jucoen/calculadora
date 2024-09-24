<?php
function performCalculation($num1, $num2, $operation) {
    switch ($operation) {
        case 'suma':
            return $num1 + $num2;
        case 'resta':
            return $num1 - $num2;
        case 'multiplicacion':
            return $num1 * $num2;
        case 'division':
            return $num1 / $num2;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $num1 = filter_var($_POST['numero1'], FILTER_SANITIZE_NUMBER_FLOAT);
        $num2 = filter_var($_POST['numero2'], FILTER_SANITIZE_NUMBER_FLOAT);
        $operation = $_POST['operacion'];

        if (!is_numeric($num1) || !is_numeric($num2)) {
            throw new Exception("Invalid input. Please enter numbers.");
        }

        $result = performCalculation($num1, $num2, $operation);
        echo "Result: $result";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>