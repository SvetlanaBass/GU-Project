let $cartDataDiv = document.querySelector(".goods-in-cart");

function refreshCart(){
    let goodsInCart = +$cartDataDiv.innerHTML;
    add(goodsInCart);
}

function add(goodsInCart) {
    if (document.querySelectorAll(".btn__name").length > 0) {
        let id_good = location.search.split('id=')[1];
        let xhr2 = new XMLHttpRequest();
        xhr2.open("GET", "?addToCart/addToCart?id=" + id_good, true);
        xhr2.send();
        xhr2.onreadystatechange = function () {
            if (this.readyState !== 4) return;
            if (this.status !== 200) {
                console.log('Error', xhr2.status, xhr2.statusText)
            } else {
                console.log('Ok!', xhr2.statusText, xhr2.responseText);
                goodsInCart++;
                $cartDataDiv.innerHTML = "";
                $cartDataDiv.innerHTML = goodsInCart;
            }
        };
    } else {
        document.querySelector(".loginMessage").style.display = "block";
    }

}

function deleteFromCart(productID, userID, el) {
    let xhr2 = new XMLHttpRequest();
    xhr2.open("GET", "?deleteFromCart/deleteFromCart&id_product=" + productID + "&id_user=" + userID, true);
    xhr2.send();
    xhr2.onreadystatechange = function () {
        if (this.readyState !== 4) return;
        if (this.status !== 200) {
            console.log('Error', xhr2.status, xhr2.statusText)
        } else {
            console.log('Ok!', xhr2.statusText, xhr2.responseText);
            el.parentNode.parentNode.style.display = "none";
            $cartDataDiv.innerHTML = +$cartDataDiv.innerHTML - 1;
        }
    };
}