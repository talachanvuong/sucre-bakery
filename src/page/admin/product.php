<?php
$connection = new mysqli('localhost', 'root', '', 'db_sucre_web');
$message = "";

if ($connection->connect_error) {
    die("Kết nối thất bại: " . $connection->connect_error);
}

function get_products($connection)
{
    $sql = "SELECT * FROM product";
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

    $sql = "UPDATE product SET pd_name = ?, pd_price = ?, pd_description = ?, pdt_id = ?";
    if ($image) {
        $sql .= ", pd_image = ?";
    }
    $sql .= " WHERE pd_id = ?";

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
    $stmt = $connection->prepare("DELETE FROM product WHERE pd_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $message = "Đã xóa sản phẩm thành công!";
    } else {
        $message = "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_POST['editProduct'])) {
    $id = $_POST['productId'];
    $sql = "SELECT * FROM product WHERE pd_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $product = $stmt->get_result()->fetch_assoc();
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
        body {
            background-color: rgb(223, 223, 223);
        }
        .container {
            display: grid;
            grid-template-areas: 
            "Menu Edit Content"
            "Menu Edit Content"
            "Menu Edit Content";
            grid-template-columns: 1fr 1fr 4fr;
        }
        .content {
            grid-area: Content;
            margin-left: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        .menu-left {
            grid-area: Menu;
            display: flex;
            flex-direction: column;
            background-color: white;
            height: auto;
            width: 250px;
        }
        #label {
            background-color: aqua;
            margin: 0px;
            padding: 5px 0px 5px 0px;
        }
        #input {
            margin: 5px 20px 5px 20px;
            padding: 5px 0px 5px 0px;
            height: 20px;
            width: 200px;
        }
        .over-view p {
            background-color: aqua;
            margin: 0px;
            padding: 5px 0px 5px 0px;
        }
        .over-view ul {
            display: block;
            padding: 0px;
            margin: 0px;
            text-align: center;
        }
        #list-items li {
            padding: 5px;
        }
        #list-items li:hover {
            background-color: rgb(220, 229, 237);
        }
        .product {
            padding: 8px 0 8px 0;
        }
        .product p {
            background-color: aqua;
            margin: 0px;
            padding: 5px 0px 5px 0px;
        }
        .product ul {
            display: block;
            padding: 0px;
            margin: 0px;
            text-align: center;
        }
        #product-items li {
            padding: 5px;
        }
        #product-items li:hover {
            background-color: rgb(220, 229, 237);
        }
        .edit-product {
            grid-area: Edit;
        }
        a {
            text-decoration: none;
            color: black;
        }
        h1 {
            background-color: red;
            font-size: larger;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="menu-left">
            <div class="search-input">
                <p id="label">Tìm kiếm</p>
                <input id="input" type="text" placeholder="Theo tên sản phẩm...">
            </div>
            <div class="over-view">
                <p id="view-list"><a href="?direct=home">Thống kê tổng quan</a></p>
            </div>
            <div class="product">
                <p id="product-list">Sản phẩm</p>
                <ul style="list-style: none;" id="product-items">
                    <li><a href="#">Bánh ngọt</a></li>
                    <li><a href="#">Bánh bông lan</a></li>
                    <li><a href="#">Bánh trung thu</a></li>
                    <li><a href="#">Bánh kem</a></li>
                </ul>
            </div>
        </div>
        <form method="POST" enctype="multipart/form-data" class="edit-product">
            <h1>Quản lý Sản phẩm</h1>
            <input type="hidden" name="productId" value="<?= htmlspecialchars($product['pd_id'] ?? '') ?>">
            <div><label>Tên sản phẩm:</label><input type="text" name="productName" value="<?= htmlspecialchars($product['pd_name'] ?? '') ?>" required></div>
            <div><label>Giá:</label><input type="number" name="productPrice" value="<?= htmlspecialchars($product['pd_price'] ?? '') ?>" required></div>
            <div><label>Mô tả:</label><textarea name="productDescription" required><?= htmlspecialchars($product['pd_description'] ?? '') ?></textarea></div>
            <div><label>Loại:</label><input type="text" name="productType" value="<?= htmlspecialchars($product['pdt_id'] ?? '') ?>" required></div>
            <div><label>Hình ảnh:</label><input type="file" name="productImage" accept="image/*"></div>
            <button type="submit" name="addProduct">Thêm</button>
            <button type="submit" name="updateProduct">Sửa</button>
        </form>

        <div class="content">
            <h1>Danh sách sản phẩm</h1>
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
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="productId" value="<?= $product['pd_id'] ?>">
                                    <button type="submit" name="editProduct">Sửa</button>
                                </form>
                                <form method="POST" style="display:inline;">
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
