<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2212003</title>
    <!-- Ajax Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Css -->
    <link rel="stylesheet" href="./style2.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-expand-md bg-body-tertiary shadow-sm">
            <div class="container-fluid mx-4">
              <a class="navbar-brand me-5" href="list.php">Site Title</a>
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
        <div class="col-lg-8 col-md-10 middle container pt-2">
            <p>Home &gt; Main Category &gt; Sub Category</p>
            <div class="middle-content row">
                <div class="middle-left col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class='left-top'>
                        <img src='' class='img-fluid w-100 h-100 border' alt='...'>
                    </div>
                    <div class='left-bottom row mt-2'></div>
                </div>
                <div class="middle-right col-lg-6 col-md-6 col-sm-6 container-lg col-6">
                    <h2>Loading...</h2>
                    <h4 class='mt-3'>Summary:</h4>
                    <p class='lh-lg mt-3'></p>
                    <div class='d-flex justify-content-center align-items-center mt-3'>
                        <button type='button' class='btn btn-primary px-4'>Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="middle-description mt-3">
                <h4>Description:</h4>
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
        $(document).ready(function () {
            function loadProductDetails() {
                var urlParams = new URLSearchParams(window.location.search);
                var productId = urlParams.get('id');
                $.ajax({
                    type: "GET",
                    url: "fetch_product.php?id=" + productId,
                    success: function (response) {
                        var product = JSON.parse(response);

                        $('.left-top img').attr('src', product.image);
                        $('.left-bottom').html(''); 

                        var productImages = product.images || []; 
                        productImages.forEach(function (image) {
                            var imageElement = `
                                <div class='col-lg-3 col-md-3 col-sm-3 col-3 p-1'>
                                    <a href='detail.php?id=${product.id}'>
                                        <img src='${image}' alt='...' class='img-fluid w-100 h-100 border'>
                                    </a>
                                </div>
                            `;
                            $('.left-bottom').append(imageElement);
                        });
                        $('.middle-right h2').text(product.name);
                        $('.middle-right h4').text('Summary:');
                        $('.middle-right p').text(product.description);

                        var descriptionHtml = '';
                        for (var i = 0; i < 4; i++) {
                            descriptionHtml += `<p>${product.description}</p>`;
                        }
                        $('.middle-description').html(`
                            <h4>Description:</h4>
                            ${descriptionHtml}
                        `);
                    }
                });
            }

            loadProductDetails();
        });
    </script>
</body>
</html>