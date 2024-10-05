var viewList = document.getElementById('view-list').addEventListener("click", () => {
    var listItems = document.getElementById('list-items');
    if (listItems.style.display === 'none') {
        listItems.style.display = 'block';
    } else {
        listItems.style.display = 'none';
    }
});

var productList = document.getElementById('product-list').addEventListener("click", () => {
    var productItems = document.getElementById('product-items');
    if (productItems.style.display === 'none') {
        productItems.style.display = 'block';
    } else {
        productItems.style.display = 'none';
    }
});