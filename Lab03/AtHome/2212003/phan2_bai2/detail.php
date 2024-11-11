<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>2212003</title>

  <!-- Boostrap 5.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <!-- Css -->
  <link rel="stylesheet" href="./style2.css" />
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-expand-md bg-body-tertiary shadow-sm">
      <div class="container-fluid mx-4">
        <a class="navbar-brand me-5" href="#">Site Title</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <input class="form-control me-2 rounded shadow-sm" type="search" placeholder="Search" aria-label="Search" />
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
          <?php
          if (isset($_GET['id'])) {
            $id = $_GET['id'];
          }

          $connect = mysqli_connect("localhost", "root", "", "shop");
          $sql = "SELECT * FROM products WHERE id = $id";
          $sql_1 = "SELECT image, id FROM products";
          $result = mysqli_query($connect, $sql);
          $result_1 = mysqli_query($connect, $sql_1);
          $row = mysqli_fetch_assoc($result);

          echo "
                        <div class='left-top'>
                            <img src='{$row['image']}' class='img-fluid w-100 h-100 border' alt='...'>
                        </div>
                        <div class='left-bottom row mt-2'>";
          while ($row_1 = mysqli_fetch_assoc($result_1)) {
            echo " <div class='col-lg-3 col-md-3 col-sm-3 col-3 p-1'>
                                    <a href='detail.php?id={$row_1['id']}'>
                                        <img src='{$row_1['image']}' alt='...' class='img-fluid w-100 h-100 border'>
                                    </a>
                                </div> ";
          }
          echo "</div>";
          ?>
        </div>
        <?php
        echo "<div class='middle-right col-lg-6 col-md-6 col-sm-6 container-lg col-6'>
                        <h2>{$row['name']}</h2>
                        <h4 class='mt-3'>Summary:</h4>
                        <p class='lh-lg mt-3'>{$row['description']}</p>
                        <div class='d-flex justify-content-center align-items-center mt-3'>
                            <button type='button' class='btn btn-primary px-4'>Buy Now</button>
                        </div>
                    </div> "
          ?>
        <div class="middle-description mt-3">
          <h4>Description:</h4>
          <?php
          for ($i = 0; $i < 4; $i++) {
            echo "<p> {$row['description']} </p>";
          }
          ?>
        </div>
      </div>
    </div>

    <div class="col-lg-2 right shadow-sm d-none d-lg-block">
      <div class="content shadow-sm d-flex">
        <img src="https://www.adweek.com/wp-content/uploads/2018/05/HotlineBling-infographic-2018.jpg" alt="ads"
          class="p-4 img-fluid align-items-center shadow-sm" />
      </div>
      <div class="content-bottom shadow-sm d-flex mt-3">
        <img
          src="https://product.hstatic.net/1000063620/product/iphone-13-mini-den_759b2d242c164cf9b0d3ff1e9c76d012_large_9d677d66cfe445b29ea3bace1b4adc4c_1024x1024.jpg"
          alt="iphone" class="p-4 img-fluid align-items-center shadow-sm" />
      </div>
    </div>
  </main>
  <footer class="bg-body-tertiary shadow-sm mt-1">
    <div class="text-center info">Footer Information...</div>
    <ul class="nav justify-content-center">
      <li class="nav-item d-flex align-items-center">
        <a class="nav-link" style="text-decoration: underline" href="#">Link 1</a>
        <span>|</span>
      </li>
      <li class="nav-item d-flex align-items-center">
        <a class="nav-link" href="#" style="color: black">Link 2</a>
        <span>|</span>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="text-decoration: underline" href="#">Link 3</a>
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