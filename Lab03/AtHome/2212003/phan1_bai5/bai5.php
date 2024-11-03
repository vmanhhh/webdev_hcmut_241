<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Basic Calculator</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>
    <?php 
    $result = '';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];

        // Perform calculation based on selected operation
        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                $result = $num2 != 0 ? $num1 / $num2 : 'Error: Division by zero';
                break;
            case 'power':
                $result = pow($num1, $num2);
                break;
            case 'reciprocal':
                $result = $num1 != 0 ? 1 / $num1 : 'Error: Reciprocal of zero is undefined';
                break;
            default:
                $result = 'Invalid operation selected';
                break;
        }
    }
    ?>

    <div class="container">
        <h1 class="text-center">Basic Calculator</h1>
        <form action="" method="post" class="form-group mt-4">
            <div class="row">
                <div class="col-6">
                    <label for="num_1">Number 1</label>
                    <input type="number" step="any" id="num_1" name="num1" placeholder="Enter number 1" class="form-control" value="<?php echo isset($num1) ? $num1 : ''; ?>" required />
                </div>
                <div class="col-6">
                    <label for="num_2">Number 2</label>
                    <input type="number" step="any" id="num_2" name="num2" placeholder="Enter number 2" class="form-control" value="<?php echo isset($num2) ? $num2 : ''; ?>" required />
                </div>
            </div>
            <select id="operation" name="operation" class="form-select mt-3" required>
                <option value="add" <?php echo isset($operation) && $operation == 'add' ? 'selected' : ''; ?>>Addition</option>
                <option value="subtract" <?php echo isset($operation) && $operation == 'subtract' ? 'selected' : ''; ?>>Subtraction</option>
                <option value="multiply" <?php echo isset($operation) && $operation == 'multiply' ? 'selected' : ''; ?>>Multiplication</option>
                <option value="divide" <?php echo isset($operation) && $operation == 'divide' ? 'selected' : ''; ?>>Division</option>
                <option value="power" <?php echo isset($operation) && $operation == 'power' ? 'selected' : ''; ?>>Power</option>
                <option value="reciprocal" <?php echo isset($operation) && $operation == 'reciprocal' ? 'selected' : ''; ?>>Reciprocal of Number 1</option>
            </select>
            <div class="mt-3 row">
                <div class="col-6">
                    <label for="result">Result: </label>
                    <input type="text" id="result" class="form-control" value="<?php echo $result; ?>" placeholder="Result" readonly />
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-success px-4 py-2">Calculate</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>