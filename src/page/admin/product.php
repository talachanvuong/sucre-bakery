<?php
$connection = new mysqli('localhost', 'root', '', 'db_sucre_web');
$message = "";

if ($connection->connect_error) {
    die("Kết nối thất bại: " . $connection->connect_error);
}

function get_products($connection) {
    $sql = "SELECT * FROM `product`";
    $result = $connection->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

if (isset($_POST['addProduct'])) {
    $name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $description = $_POST['productDescription'];
    $type = $_POST['productType'];
    $image = "0x" . bin2hex(file_get_contents($_FILES['productImage']['tmp_name']));

    $stmt = $connection->prepare("INSERT INTO `product` (`pd_name`, `pd_price`, `pd_description`, `pdt_id`, `pd_image`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sdiss", $name, $price, $description, $type, $image);

    if ($stmt->execute()) {
        $message = "Đã thêm sản phẩm thành công!";
    } else {
        $message = "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_POST['updateProduct'])) {
    $id = $_POST['productId'];
    $name = $_POST['productName'];
    $price = $_POST['productPrice'];
    $description = $_POST['productDescription'];
    $type = $_POST['productType'];
    $image = $_FILES['productImage']['tmp_name'] ? "0x" . bin2hex(file_get_contents($_FILES['productImage']['tmp_name'])) : null;

    $sql = "UPDATE `product` SET `pd_name` = ?, `pd_price` = ?, `pd_description` = ?, `pdt_id` = ?";
    if ($image) {
        $sql .= ", `pd_image` = ?";
    }
    $sql .= " WHERE `pd_id` = ?";

    $stmt = $connection->prepare($sql);

    if ($image) {
        $stmt->bind_param("sdissi", $name, $price, $description, $type, $image, $id);
    } else {
        $stmt->bind_param("sdiss", $name, $price, $description, $type, $id);
    }

    if ($stmt->execute()) {
        $message = "Đã cập nhật sản phẩm thành công!";
    } else {
        $message = "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_POST['deleteProduct'])) {
    $id = $_POST['productId'];
    $stmt = $connection->prepare("DELETE FROM `product` WHERE `pd_id` = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $message = "Đã xóa sản phẩm thành công!";
    } else {
        $message = "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

$products = get_products($connection);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản phẩm - Sucre Bakery</title>
    <link rel="stylesheet" href="../../css/admin/overview/menu-left.css">
    <link rel="stylesheet" href="../../css/admin/product/product.css">
    <style>
        body { background-color: rgb(223, 223, 223); }
        .container { display: flex; }
        .menu-left { width: 250px; background-color: white; padding: 10px; }
        .content { margin-left: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
    </style>
</head>

<body>
    <div class="container">
        <div class="menu-left">
            <h3>Quản lý Sản phẩm</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="productId" value="<?= htmlspecialchars($_POST['productId'] ?? '') ?>">
                <div><label>Tên sản phẩm:</label><input type="text" name="productName" required></div>
                <div><label>Giá:</label><input type="number" name="productPrice" required></div>
                <div><label>Mô tả:</label><textarea name="productDescription" required></textarea></div>
                <div><label>Loại:</label><input type="text" name="productType" required></div>
                <div><label>Hình ảnh:</label><input type="file" name="productImage" accept="image/*"></div>
                <button type="submit" name="addProduct">Thêm</button>
                <button type="submit" name="updateProduct">Sửa</button>
            </form>
        </div>

        <div class="content">
            <h3>Danh sách sản phẩm</h3>
            <table>
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Loại</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['pd_name']) ?></td>
                            <td><?= htmlspecialchars($product['pd_price']) ?></td>
                            <td><?= htmlspecialchars($product['pd_description']) ?></td>
                            <td><?= htmlspecialchars($product['pdt_id']) ?></td>
                            <td>
                                <img src="data:image/jpeg;base64,<?= base64_encode(hex2bin(substr($product['pd_image'], 2))) ?>" width="50">
                            </td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="productId" value="<?= $product['pd_id'] ?>">
                                    <button type="submit" name="deleteProduct">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><?= htmlspecialchars($message) ?></p>
        </div>
    </div>
</body>