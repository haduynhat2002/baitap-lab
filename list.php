
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <a class=" btn btn-primary" href="index.php">form</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Thumbnail</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $username = "root"; // Khai báo username
        $password = "";      // Khai báo password
        $server   = "localhost";   // Khai báo server
        $dbname   = "products";      // Khai báo database

        // tạo kết nối
        $connect = new mysqli($server, $username, $password, $dbname);
        // kiểm kết nối
        //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
        if ($connect->connect_error) {
            die("Không kết nối :" . $connect->connect_error);
            exit();
        }


        $sql = "SELECT id, name, price, thumbnail FROM products";
        $result = $connect->query($sql);



        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td>";
                echo "<td>" . $row["name"]. "</td>";
                echo "<td>" . $row["price"]. "</td>";
                echo "<td><img style='width: 150px' src=" . $row["thumbnail"]. "></td></tr>";
            }
        } else {
            echo "0 results";
        }
        $connect->close();
        ?>
        </tbody>
    </table>
</div>

</body>
</html>