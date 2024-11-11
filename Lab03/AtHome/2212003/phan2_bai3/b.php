<?php
    // connect to database
    require_once('config.php');
    // Error
    $name_err = $description_err = $price_err = $image_err = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $image = $_POST["image"];

        // Complete
        $complete = true;

        // Validation
        // Check name
        if(!is_string($name)){
            $name_err = "Name is a string";
            $complete = false;
        }
        else{
            if(!strlen($name)){
                $name_err = "Please enter a name";
                $complete = false;
            }
            else if(strlen($name) < 5 || strlen($name) > 40){
                $name_err = "Name includes from 5 to 40 characters";
                $complete = false;
            }
        }
        // Check description
        if(!is_string($description)){
            $description_err = "Description is a string";
            $complete = false;
        }
        else{
            if(!(strlen($description)-1)){
                $description_err = "Please enter a description";
                $complete = false;
            }
            else if(strlen($description) > 5000){
                $description_err = "Description includes not over 5000 characters";
                $complete = false;
            }
        }
        // Check price
        if(empty($price) ){
            $price_err = 'Please enter a price';
            $complete = false;
            
        } else {
            if(filter_var($price, FILTER_VALIDATE_FLOAT) === false){
                $price_err = "Price is a number";
                $complete = false;
            }
        }
        // Check image
        if(!is_string($image)){
            $image_err = "Image is a string";
            $complete = false;
        }
        else{
            if(!strlen($image)){
                $image_err = "Please enter a image";
                $complete = false;
            }
            else if(strlen($image) > 255){
                $image_err = "Image includes not over 255 characters";
                $complete = false;
            }
        }

        if ($complete) {
            // Create a prepared statement
            $sql_insert = "INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)";
        
            if ($stmt = mysqli_prepare($connect, $sql_insert)) {
                
                mysqli_stmt_bind_param($stmt, "ssds", $name, $description, $price, $image);
        
                if (mysqli_stmt_execute($stmt)) {
                    header("location: index.php");
                    exit();
                } else {
                    echo "Something went wrong";
                }

                mysqli_stmt_close($stmt);
            } else {
                echo "Failed to prepare the statement";
            }

            $connect->close();
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .container{
            max-width: 1200px;
            margin: 0 auto;
            width: 80%;
        }
    </style>
</head>
<body>
    <div class="container">
        <header style="height: 100px;" class="d-flex flex-column justify-content-center">
            <h3>Create Product</h3>
            <hr>
        </header>
        
        <main>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="myform" class="form-group">
                <label for="name">Name</label> 
                <input class="form-control" type="text" id="name" name="name">
                <p class="text-danger"> <?php echo $name_err; ?> </p> 

                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"> </textarea>
                <p class="text-danger"> <?php echo $description_err; ?> </p> 

                <label for="price">Price</label>
                <input class="form-control" type="number" id="price" name="price"> </input>
                <p class="text-danger"> <?php echo $price_err; ?> </p> 
                
                <label for="image">Image</label>
                <input class="form-control" type="text" id="image" name="image"> </input>
                <p class="text-danger"> <?php echo $image_err; ?> </p> 

                <div class="d-flex align-items-center justify-content-end gap-2">
                    <button type="reset" class="btn btn-danger">Delete</button>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>