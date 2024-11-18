<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2212003</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <header class="d-flex align-items-center" style="height: 100px;">
            <h2>Read Product</h2>
        </header>
        <main>
            <a href="b.php">
                <button type="submit" class="btn btn-primary">Create New Product</button>
            </a>
            <table id="productTable" class="table table-bordered mt-3">
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
                <tbody></tbody>
            </table>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script>
        $(document).ready(function () {
            function fetchProducts() {
                $.ajax({
                    url: 'a.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        displayProducts(response);
                    },
                    error: function (error) {
                        console.error('Error fetching products:', error);
                    }
                });
            }

            function displayProducts(products) {
                var container = $('#productTable tbody');
                container.empty();

                $.each(products, function (index, product) {
                    var row = $('<tr class="text-center"></tr>');
                    row.append(`<td>${product.id}</td>`);
                    row.append(`<td>${product.name}</td>`);
                    row.append(`<td>${product.description}</td>`);
                    row.append(`<td>${product.price}</td>`);
                    row.append(`<td><img style="height: 100px; width: 100px;" src="${product.image}" alt="..."></td>`);
                    row.append(`<td class="d-flex align-items-center gap-2">
                                    <a href='c.php?id=${product.id}'><button class='btn btn-warning'>Edit</button></a>
                                    <button class='btn btn-danger' onclick='deleteProduct(${product.id})'>Delete</button>
                                </td>`);

                    container.append(row);
                });
            }

            // Function to delete a product
            window.deleteProduct = function (productId) {
                if (confirm('Are you sure you want to delete this product?')) {
                    $.ajax({
                        type: 'GET',
                        url: 'd.php?id=' + productId,
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                alert(response.message);
                                // Remove the deleted product row from the table
                                $('#productTable tbody tr').filter(function () {
                                    return $('td:first-child', this).text() == productId;
                                }).remove();
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function () {
                            alert('Error deleting product. Please try again.');
                        }
                    });
                }
            };

            fetchProducts();
        });
    </script>

</body>

</html>