<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2212003</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>

<body>
    <?php
    require_once('a.php');
    ?>
    <div class="container">
        <header class="d-flex align-items-center" style="height: 100px;">
            <h2>Read Product</h2>
        </header>
        <main>
            <a href="b.php">
                <button type="submit" class="btn btn-primary">Create New Product</button>
            </a>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr class="text-center" style='background-color: gray;'>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_select)) {
                        echo '<tr class="text-center">';
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['description']}</td>";
                        echo "<td>{$row['price']}</td>";
                        echo "<td><img style='height: 100px; width: 100px;' src='{$row['image']}' alt='...'></td>";
                        echo "<td class='d-flex align-items-center gap-2'>
                                <a href='c.php?id={$row['id']}'>
                                    <button class='btn btn-warning'>Edit</button>
                                </a>
                                <a href='d.php?id={$row['id']}'>
                                    <button class='btn btn-danger'>Delete</button>
                                </a>
                              </td>";
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</body>

</html>