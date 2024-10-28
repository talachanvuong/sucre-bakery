<?php
global $api;
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

if (isset($_GET['keyword'])) {
    $keyword = $connection->real_escape_string($_GET['keyword']);
    $products = $api->get_products_by_keyword($keyword);
} else {
    $products = get_products($connection); 
}

if (isset($_POST['addProduct'])) {
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];
    $productType = $_POST['productType'];
    $productImage = $_FILES['productImage']['tmp_name'] ?? null;

    $result = $api->add_product($productName, $productPrice, $productDescription, $productType, $productImage);
    $message = $result['message'];
}

if (isset($_POST['deleteProduct'])) {
    $productId = $_POST['productId'];
    $result = $api->remove_product($productId);
    $message = $result['message'];
}

if (isset($_POST['editProduct'])) {
    $productId = $_POST['productId'];
    $product = $api->get_product_by_id($productId);
}

if (isset($_POST['updateProduct'])) {
    $productId = $_POST['productId'];
    $productData = [
        'pd_name' => $_POST['productName'],
        'pd_price' => $_POST['productPrice'],
        'pd_description' => $_POST['productDescription'],
        'pdt_id' => $_POST['productType'],
        'pd_image' => $_FILES['productImage']['tmp_name'] ?? null
    ];

    $result = $api->edit_product($productId, $productData);
    $message = $result['message'];
}
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
            font-family: Arial, sans-serif;
        }

        .container {
            display: grid;
            grid-template-areas:
                "Edit Content Content"
                "Edit Content Content"
                "Edit Content Content";
            grid-template-columns: 1fr 3fr;
            gap: 10px;
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
            padding: 10px;
            width: 250px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #label,
        #product-list {
            background-color: aqua;
            margin: 0;
            padding: 5px 10px;
            font-weight: bold;
        }

        #input {
            margin: 5px 20px;
            padding: 5px;
            height: 30px;
            width: 90%;
        }

        .over-view p {
            background-color: aqua;
            margin: 0;
            padding: 5px 10px;
        }

        .over-view ul {
            display: block;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        #list-items li,
        #product-items li {
            padding: 5px;
            cursor: pointer;
        }

        #list-items li:hover,
        #product-items li:hover {
            background-color: rgb(220, 229, 237);
        }

        .edit-product {
            grid-area: Edit;
            padding: 10px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        a {
            text-decoration: none;
            color: black;
        }

        h1 {
            background-color: red;
            font-size: larger;
            text-align: center;
            color: white;
            padding: 10px;
        }

        .message {
            color: green;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <form method="POST" enctype="multipart/form-data" class="edit-product">
            <h1 style="margin-bottom: 15px;">Quản lý Sản phẩm</h1>
            <input type="hidden" name="productId" value="<?php echo $product['pd_id'] ?? ''; ?>">
            <div>
                <label>Tên sản phẩm:</label>
                <input type="text" name="productName" value="<?php echo $product['pd_name'] ?? ''; ?>" required>
            </div>
            <div>
                <label>Giá:</label>
                <input type="number" name="productPrice" value="<?php echo $product['pd_price'] ?? ''; ?>" required>
            </div>
            <div>
                <label>Mô tả:</label>
                <textarea name="productDescription" required><?php echo $product['pd_description'] ?? ''; ?></textarea>
            </div>
            <div>
                <label>Loại:</label>
                <input type="text" name="productType" value="<?php echo $product['pdt_id'] ?? ''; ?>" required>
            </div>
            <div>
                <label>Hình ảnh:</label>
                <input style="margin-top: 10px;" type="file" name="productImage" accept="image/*">
            </div>
            <button style="height: 30px; width: 50%; margin-top: 15px;" type="submit" name="addProduct">Thêm</button>
            <button style="height: 30px; width: 45%;" type="submit" name="updateProduct">Sửa</button>
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
                    <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="6">Không có sản phẩm nào được tìm thấy.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?php echo $product['pd_name']; ?></td>
                                <td><?php echo $product['pd_price']; ?></td>
                                <td><?php echo $product['pd_description']; ?></td>
                                <td><?php echo $product['pdt_id']; ?></td>
                                <td>
                                    <img src="data:image/jpeg;base64,<?= base64_encode(hex2bin(substr($product['pd_image'], 2))) ?>" width="50">
                                </td>
                                <td>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="productId" value="<?php echo $product['pd_id']; ?>">
                                        <button type="submit" name="deleteProduct">Xóa</button>
                                    </form>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="productId" value="<?php echo $product['pd_id']; ?>">
                                        <button type="submit" name="editProduct">Sửa</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <?php if (!empty($message)): ?>
                <p class="message"><?php echo $message; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>