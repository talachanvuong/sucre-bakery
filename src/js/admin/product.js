let productList = [];

function addProduct() {
    const name = document.getElementById('productName').value;
    const price = document.getElementById('productPrice').value;
    const description = document.getElementById('productDescription').value;
    const image = document.getElementById('productImage').value;
    const type = document.getElementById('productType').value;

    if (name && price && description && image && type) {
        const newProduct = { name, price, description, image, type };
        productList.push(newProduct);
        renderProductTable();
        clearForm();
    } else {
        alert("Vui lòng nhập đầy đủ thông tin!");
    }
}

function renderProductTable() {
    const tableBody = document.querySelector('#productTable tbody');
    tableBody.innerHTML = '';

    productList.forEach((product, index) => {
        const row = `
            <tr>
                <td>${product.name}</td>
                <td>${product.price}</td>
                <td>${product.description}</td>
                <td><img src="${product.image}" alt="${product.name}" style="width: 50px; height: 50px;"></td>
                <td>${product.type}</td>
                <td>
                    <button class="btn btn-edit" onclick="editProduct(${index})">Sửa</button>
                    <button class="btn btn-danger" onclick="deleteProduct(${index})">Xóa</button>
                </td>
            </tr>
        `;
        tableBody.innerHTML += row;
    });
}

function deleteProduct(index) {
    productList.splice(index, 1);
    renderProductTable();
}

function editProduct(index) {
    const product = productList[index];
    document.getElementById('productName').value = product.name;
    document.getElementById('productPrice').value = product.price;
    document.getElementById('productDescription').value = product.description;
    document.getElementById('productImage').value = product.image;
    document.getElementById('productType').value = product.type;

    document.querySelector('.btn').innerText = 'Cập nhật sản phẩm';
    document.querySelector('.btn').onclick = function() {
        updateProduct(index);
    };
}

function updateProduct(index) {
    productList[index].name = document.getElementById('productName').value;
    productList[index].price = document.getElementById('productPrice').value;
    productList[index].description = document.getElementById('productDescription').value;
    productList[index].image = document.getElementById('productImage').value;
    productList[index].type = document.getElementById('productType').value;

    renderProductTable();
    clearForm();

    document.querySelector('.btn').innerText = 'Thêm sản phẩm';
    document.querySelector('.btn').onclick = addProduct;
}

function clearForm() {
    document.getElementById('productName').value = '';
    document.getElementById('productPrice').value = '';
    document.getElementById('productDescription').value = '';
    document.getElementById('productImage').value = '';
    document.getElementById('productType').value = '';
}