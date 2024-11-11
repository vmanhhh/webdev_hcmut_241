<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2212003</title>
    <!-- Ajax Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Boostrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Css -->
    <link rel="stylesheet" href="./style1.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-expand-md bg-body-tertiary shadow-sm">
            <div class="container-fluid mx-4">
              <a class="navbar-brand me-5" href="#">Site Title</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                  <input class="form-control me-2 rounded shadow-sm" type="search" placeholder="Search" aria-label="Search">
                </form>
              </div>
            </div>
        </nav>
    </header>
    <main class="row bg-body-tertiary shadow-sm">
        <div class="col-lg-2 col-md-2 left shadow-sm">
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
                <a href="#">Item 1...</a>
                <a href="#">Item 2...</a>
                <a href="#">Item 3...</a>
                <a href="#">Item 4...</a>
                <a href="#">Item 5...</a>
            </div>
        </div>
        <div class="col-lg-8 middle pt-lg-3 col-md-10">
            <h3 class="px-3 text-center">Top Product</h3>
            <div class="container my-2" id="productsContainer">
                <div class="row" id="productsRow">
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
        </div>
        <div class="col-lg-2 right shadow-sm d-none d-lg-block">
            <div class="content shadow-sm d-flex">
                <img src="./img/image2.jpg" alt="iphone" class="p-4 img-fluid align-items-center shadow-sm">
            </div>
            <div class="content-bottom shadow-sm d-flex mt-3">
                <img src="./img/image3.jpg" alt="apple_watch" class="p-4 img-fluid align-items-center shadow-sm">
            </div>
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
    <script>
        function loadProducts() {
            $.ajax({
                type: "GET",
                url: "fetch_products.php",
                success: function (response) {
                    var products = JSON.parse(response);
                    var productsRow = $("#productsRow");

                    productsRow.html("");

                    products.forEach(function (product) {
                        var productCard = `
                            <div class="col-lg-4 col-md-6 p-lg-3">
                                <div class="card shadow-sm" style="height: 400px">
                                    <div style="height: 200px">
                                        <a href="detail.php?id=${product.id}">
                                            <img src="${product.image}" class="card-img-top p-2 h-100 w-100" style="cursor: pointer" alt="...">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-center fw-bold">${product.name}</p>
                                        <p class="card-text text-center fw-bold">Price: ${product.price}</p>
                                        <div class="text-center">
                                            <button href="#" class="btn btn-primary">Buy Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        productsRow.append(productCard);
                    });
                }
            });
        }

        loadProducts();
    </script>
</body>
</html>