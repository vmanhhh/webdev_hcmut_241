<!DOCTYPE html>
<html>

<body>
    <?php
    function printMessage($number)
    {
        if ($number <= 0 || is_int($number*1) == false) {
            echo "Invalid input";
            return;
        }
        $number = $number % 10;
        switch ($number) {
            case 0:
                echo "Hello";
                break;
            case 1:
                echo "How are you?";
                break;
            case 2:
                echo "I'm doing well, thank you";
                break;
            case 3:
                echo "See you later";
                break;
            case 4:
                echo "Good-bye";
                break;
            default:
                break;
        }
    }
    $numinput = $_POST['n'];
    printMessage($numinput);
    ?>
</body>

</html>