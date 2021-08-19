<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server = "localhost";   // Khai báo server
$dbname = "products";      // Khai báo database

// Kết nối database tintuc
$connect = new mysqli($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
    die("Không kết nối :" . $connect->connect_error);
    exit();
}

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$id = "";
$price = "";
$name = "";
$thumbnail = "";


//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"])) {
        $id = $_POST['id'];
    }
    if (isset($_POST["price"])) {
        $price = $_POST['price'];
    }
    if (isset($_POST["name"])) {
        $name = $_POST['name'];
    }
    if (isset($_POST["thumbnail"])) {
        $thumbnail = $_POST['thumbnail'];
    }

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO products (id, name, price, thumbnail)
    VALUES ('$id', '$name', '$price', '$thumbnail')";

    if ($connect->query($sql) === TRUE) {
        echo "<div class='container alert alert-success'><strong>Success!</strong> Them moi thanh cong</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//Đóng database
$connect->close();
?>
<div class="container">
    <h2>Stacked form</h2>
    <a class=" btn btn-primary" href="list.php">List</a>
    <form action="" method="post">
        <div class="form-group">
            <label>Id:</label>
            <input type="text" class="form-control" placeholder="Enter Id" name="id">
        </div>
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="name">
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input type="text" class="form-control" placeholder="Enter Price" name="price">
        </div>
        <div class="form-group">
            <label>Thumbnail:</label>
            <input type="text" class="form-control" placeholder="Enter Thumbnail" name="thumbnail">
        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
        </div>
        <button type="submit" class="col-12 btn btn-primary">Submit</button>

    </form>
</div>
</body>
</html>
