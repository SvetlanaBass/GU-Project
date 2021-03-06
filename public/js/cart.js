let cartDataDiv = document.querySelector(".goods-in-cart");

function addToCart() {
    let goodsInCart = +cartDataDiv.innerHTML;
    let quantity = +document.querySelector(".filter-qty").value;
    if (document.querySelectorAll(".btn__name").length > 0) {
        if(quantity === null || quantity < 1){
            quantity = 1;
        }
        let id_good = location.search.split('id=')[1];
        let xhr2 = new XMLHttpRequest();
        xhr2.open("GET", "?addToCart/addToCart&id=" + id_good + "&quantity=" + quantity, true);
        xhr2.send();
        xhr2.onreadystatechange = function () {
            if (this.readyState !== 4) return;
            if (this.status !== 200) {
                console.log('Error', xhr2.status, xhr2.statusText)
            } else {
                console.log('Ok!', xhr2.statusText, xhr2.responseText);
                goodsInCart += quantity;
                cartDataDiv.innerHTML = "";
                cartDataDiv.innerHTML = goodsInCart;
            }
        };
    } else {
        document.querySelector(".loginMessage").style.display = "block";
    }

}

function deleteFromCart(productID, userID, quantity, price, el) {
    let totalAmount = document.querySelector(".total-amount");
    let totalAmountNum = totalAmount.innerHTML.replace("$","");
    let xhr2 = new XMLHttpRequest();
    xhr2.open("GET", "?deleteFromCart/deleteFromCart&id_product=" + productID + "&id_user=" + userID + "&quantity=" + quantity, true);
    xhr2.send();
    xhr2.onreadystatechange = function () {
        if (this.readyState !== 4) return;
        if (this.status !== 200) {
            console.log('Error', xhr2.status, xhr2.statusText)
        } else {
            console.log('Ok!', xhr2.statusText, xhr2.responseText);
            el.parentNode.parentNode.style.display = "none";
            cartDataDiv.innerHTML = "" + (+cartDataDiv.innerHTML - quantity) + "";
            let newTotalAmount = +totalAmountNum - quantity * price;
            totalAmount.innerHTML = "";
            totalAmount.innerHTML = "" + newTotalAmount + "";
        }
    };
}