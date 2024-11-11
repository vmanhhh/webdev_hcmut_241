<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng Ký Thành Viên</title>
</head>
<body>

<?php
// Khởi tạo các biến lưu lỗi
$errors = [];
$firstName = $lastName = $email = $password = $birthday = $gender = $country = $about = "";

// Xử lý khi người dùng submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra First Name
    $firstName = $_POST['first_name'];
    if (empty($firstName) || strlen($firstName) < 2 || strlen($firstName) > 30) {
        $errors['first_name'] = "First name phải từ 2-30 kí tự.";
    }

    // Kiểm tra Last Name
    $lastName = $_POST['last_name'];
    if (empty($lastName) || strlen($lastName) < 2 || strlen($lastName) > 30) {
        $errors['last_name'] = "Last name phải từ 2-30 kí tự.";
    }

    // Kiểm tra Email
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Định dạng email không hợp lệ.";
    }

    // Kiểm tra Password
    $password = $_POST['password'];
    if (empty($password) || strlen($password) < 2 || strlen($password) > 30) {
        $errors['password'] = "Password phải từ 2-30 kí tự.";
    }

    // Kiểm tra Birthday
    $birthday = $_POST['birthday'];
    if (empty($birthday)) {
        $errors['birthday'] = "Hãy chọn ngày sinh.";
    }

    // Kiểm tra Gender
    $gender = $_POST['gender'] ?? '';
    if (empty($gender)) {
        $errors['gender'] = "Hãy chọn giới tính.";
    }

    // Kiểm tra Country
    $country = $_POST['country'];
    if (empty($country)) {
        $errors['country'] = "Hãy chọn quốc gia.";
    }

    // Kiểm tra About
    $about = $_POST['about'];
    if (strlen($about) > 10000) {
        $errors['about'] = "Phần giới thiệu không được vượt quá 10000 kí tự.";
    }

    // Nếu không có lỗi, xử lý dữ liệu (ví dụ: lưu vào database)
    if (empty($errors)) {
        echo "<p>Đăng ký thành công!</p>";
        // Thực hiện các thao tác lưu vào cơ sở dữ liệu tại đây
    }
}
?>

<h2>Form Đăng Ký Thành Viên</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <!-- First Name -->
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($firstName); ?>">
    <span style="color:red"><?php echo $errors['first_name'] ?? ''; ?></span>
    <br><br>

    <!-- Last Name -->
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($lastName); ?>">
    <span style="color:red"><?php echo $errors['last_name'] ?? ''; ?></span>
    <br><br>

    <!-- Email -->
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <span style="color:red"><?php echo $errors['email'] ?? ''; ?></span>
    <br><br>

    <!-- Password -->
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <span style="color:red"><?php echo $errors['password'] ?? ''; ?></span>
    <br><br>

    <!-- Birthday -->
    <label for="birthday">Birthday:</label>
    <input type="date" id="birthday" name="birthday" value="<?php echo htmlspecialchars($birthday); ?>">
    <span style="color:red"><?php echo $errors['birthday'] ?? ''; ?></span>
    <br><br>

    <!-- Gender -->
    <label>Gender:</label>
    <input type="radio" name="gender" value="male" <?php echo ($gender === 'male') ? 'checked' : ''; ?>> Male
    <input type="radio" name="gender" value="female" <?php echo ($gender === 'female') ? 'checked' : ''; ?>> Female
    <input type="radio" name="gender" value="other" <?php echo ($gender === 'other') ? 'checked' : ''; ?>> Other
    <span style="color:red"><?php echo $errors['gender'] ?? ''; ?></span>
    <br><br>

    <!-- Country -->
    <label for="country">Country:</label>
    <select name="country" id="country">
        <option value="" <?php echo ($country === '') ? 'selected' : ''; ?>>Select</option>
        <option value="Vietnam" <?php echo ($country === 'Vietnam') ? 'selected' : ''; ?>>Vietnam</option>
        <option value="Australia" <?php echo ($country === 'Australia') ? 'selected' : ''; ?>>Australia</option>
        <option value="United States" <?php echo ($country === 'United States') ? 'selected' : ''; ?>>United States</option>
        <option value="India" <?php echo ($country === 'India') ? 'selected' : ''; ?>>India</option>
        <option value="Other" <?php echo ($country === 'Other') ? 'selected' : ''; ?>>Other</option>
    </select>
    <span style="color:red"><?php echo $errors['country'] ?? ''; ?></span>
    <br><br>

    <!-- About -->
    <label for="about">About:</label><br>
    <textarea id="about" name="about" rows="4" cols="50"><?php echo htmlspecialchars($about); ?></textarea>
    <span style="color:red"><?php echo $errors['about'] ?? ''; ?></span>
    <br><br>

    <!-- Submit and Reset buttons -->
    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>

</body>
</html>