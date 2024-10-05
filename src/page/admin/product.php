<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucre Bakery</title>
    <link rel="stylesheet" href="../../css/admin/overview/menu-left.css">
    <link rel="stylesheet" href="../../css/admin/product/product.css">
</head>

<body>
    <div class="container">
        <div class="menu-left">
            <div class="search-input">
                <p id="label">Tìm kiếm</p>
                <input id="input" type="text" placeholder="Theo tên sản phẩm...">
            </div>
            <div class="over-view">
                <p id="view-list"><a href="/index.html">Thống kê tổng quan</a></p>
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
        <div class="content">
            <div style="width:auto;">
                <h3>Thêm sản phẩm mới</h3>
                <div class="form-group">
                    <label for="productName">Tên sản phẩm:</label>
                    <input type="text" id="productName" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="form-group">
                    <label for="productPrice">Giá:</label>
                    <input type="number" id="productPrice" placeholder="Nhập giá sản phẩm">
                </div>
                <div class="form-group">
                    <label for="productDescription">Mô tả:</label>
                    <textarea id="productDescription" placeholder="Nhập mô tả sản phẩm"></textarea>
                </div>
                <div class="form-group">
                    <label for="productImage">Hình ảnh (URL):</label>
                    <input type="text" id="productImage" placeholder="Nhập đường dẫn hình ảnh">
                </div>
                <div class="form-group">
                    <label for="productType">Loại:</label>
                    <input type="text" id="productType" placeholder="Nhập loại sản phẩm">
                </div>
                <button class="btn" onclick="addProduct()">Thêm sản phẩm</button>
            </div>

            <table id="productTable">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>Loại</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="../../js/admin/overview.js"></script>
<script src="../../js/admin/product.js"></script>

</html>