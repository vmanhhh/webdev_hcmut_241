<html>

<body>
    <?php
    echo "Odd numbers from 1 to 100 using for loop: ";
    for ($i = 1; $i <= 100; $i += 2) {
        echo $i . " ";
    }

    echo "<br>Odd numbers from 1 to 100 using while loop: ";
    $i = 1;
    while ($i <= 100) {
        echo $i . " ";
        $i += 2;
    }
    ?>
</body>

</html>