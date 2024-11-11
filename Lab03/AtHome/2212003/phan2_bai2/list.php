<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2212003</title>

    <!-- Boostrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Css -->
    <link rel="stylesheet" href="./style1.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-body-tertiary shadow-sm">
            <div class="container-fluid mx-4">
                <a class="navbar-brand me-5" href="#">Site Title</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link" href="#">Categories</a>
                            <span>|</span>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link" href="#">Contact us</a>
                            <span>|</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Follow us</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 rounded shadow-sm" type="search" placeholder="Search"
                            aria-label="Search">
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main class="row bg-body-tertiary shadow-sm">
        <div class="col-lg-2 left shadow-sm d-none d-lg-block">
            <div class="text-center name-list">Category</div>
            <div class="list-1 d-flex flex-column text-center">
                <a href="#">Item 1...</a>
                <a href="#">Item 2...</a>
                <a href="#">Item 3...</a>
                <a href="#">Item 4...</a>
                <a href="#">Item 5...</a>
            </div>
            <div class="text-center name-list">Top Products</div>
            <div class="list-2 d-flex flex-column text-center">
                <a href="#">Product 1...</a>
                <a href="#">Product 2...</a>
                <a href="#">Product 3...</a>
                <a href="#">Product 4...</a>
                <a href="#">Product 5...</a>
            </div>
        </div>
        <div class="col-lg-8 pt-lg-3 middle shadow-sm">
            <h3 class="px-3">Top Product</h3>
            <div class="container my-2">
                <div class="row">
                    <?php
                    $connect = mysqli_connect("localhost", "root", "", "shop");
                    $sql = "SELECT * from products";
                    $result = mysqli_query($connect, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='col-lg-4 col-md-6 h-100 p-lg-3'>
                        <div class='card shadow-sm' style='height: 400px'>
                        <a href='detail.php?id={$row['id']}'>
                            <img class='card-img-top p-2 h-100 w-100'
                                src={$row['image']}
                                alt='Card image cap'
                                style='cursor: pointer'>
                            </a>
                            <div class='card-body'>
                            <p class='card-text text-center fw-bold'>{$row['name']}</p>
                                <p class='card-text text-center fw-bold'>Price: " . $row['price'] . " VND</p>
                                <div class='text-center'>
                                    <button class='btn btn-primary'>Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </div>";
                    }
                    mysqli_close($connect);
                    ?>

                </div>
            </div>

            <nav aria-label="Page navigation example shadow-sm">
                <ul class="pagination justify-content-end mt-3">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
            <br>
        </div>
        <div class="col-md-2 d-none d-lg-block">
            <img src="https://www.adweek.com/wp-content/uploads/2018/05/HotlineBling-infographic-2018.jpg" alt="iphone"
                class="p-4 img-fluid align-items-center shadow-sm">
        </div>

    </main>
    <footer class="bg-body-tertiary shadow-sm mt-1">
        <div class="text-center info"> Footer Information... </div>
        <ul class="nav justify-content-center">
            <li class="nav-item d-flex align-items-center">
                <a class="nav-link" style="text-decoration: underline;" href="#">Link 1</a>
                <span>|</span>
            </li>
            <li class="nav-item d-flex align-items-center">
                <a class="nav-link" href="#" style="color: black;">Link 2</a>
                <span>|</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="text-decoration: underline;" href="#">Link 3</a>
            </li>
        </ul>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>