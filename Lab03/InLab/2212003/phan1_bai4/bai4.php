<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .container {
            width: 30%;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <?php
    $matrixArray = array();
    for ($i = 0; $i < 7; $i++) {
        for ($j = 0; $j < 7; $j++) {
            $matrixArray[$i][$j] = ($i + 1) * ($j + 1);
        }
    }
    ?>
    <div class="container">
        <table class="table table-bordered border border-dark text-center" style="
            background-color: yellow;
        ">
            <?php
            for ($i = 0; $i < 7; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 7; $j++) {
                    echo "<td>" . $matrixArray[$i][$j] . "</td>";
                }
                echo "</tr>";
            }
            ?>
    </div>
</body>

</html>