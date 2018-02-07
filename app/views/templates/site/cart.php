<div class="container">
    <header class="header">
        <div class="content">
            <div class="content__left">
                <a class="logo" href="/">
                    <span class="logo__title">BRAN<span>D</span></span>
                </a>
            </div>
            <div class="content__center">

            </div>
            <div class="content__right">
                <?php
                    if(isset($_COOKIE['site_login'])){
                        echo '<a class="cart" href="?cart/cart">
                                <div class="goods-in-cart content__goods-in-cart">'.$goodsInCart.'</div>
                              </a>
                              <span class="btn__name">' . $_COOKIE['site_login'] . '</span>
                              <a class="btn" href="?logout/logout">Log out</a>';
                    } else {
                        echo '<a class="cart" href="?cart/cart">
                                <div class="goods-in-cart content__goods-in-cart">'.$goodsInCart.'</div>
                              </a>
                              <a class="btn" href="?register/RenderRegisterPage">Create Account</a>
                              <a class="btn" href="?login/RenderLoginPage">Login</a>';
                    }
                ?>
            </div>
        </div>
    </header>
    <nav id="menu"></nav>
    <div class="new-arrivals">
        <div class="content">
            <h1>CART</h1>
            <h3>HOME &#47; <span> CART</span></h3>
        </div>
    </div>
    <div class="content">
        <table>
            <thead>
                <tr>
                    <th class="col1">PRODUCT DETAILS</th>
                    <th>UNITE PRICE</th>
                    <th>QUANTITY</th>
                    <th>SUBTOTAL</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($cart as $key => $value){
                        echo '<tr>
                                <td class="col1">
                                    <img class="product-cart" src="'.$cart[$key]['product_img'].'" alt="product image">
                                    <span class="title">'.$cart[$key]['product_name'].'</span>
                                    <span class="attribute">Product ID: <span class="attribute-value">'.$cart[$key]['id_product'].'</span></span>
                                    <span class="attribute">For: <span class="attribute-value">'.$cart[$key]['gender'].'</span></span>
                                </td>
                                <td class="td">$'.$cart[$key]['product_price'].'</td>
                                <td class="td">'.$cart[$key]['quantity'].'</td>
                                <td class="td">$'.$cart[$key]['product_price']*$cart[$key]['quantity'].'</td>
                                <td class="td">
                                    <i class="icon-cancel-circled" onclick="deleteFromCart()"></i>
                                </td>
                              </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="content flex">
        <a class="flex__btn" href="/">CONTINUE SHOPPING</a>
        <div class="itemN flex__item flex__item--card item3">
            <h2 class="h2 item__h2 item3__h2">GRAND TOTAL <span>
                    <?php
                    $totalSum = 0;
                        foreach ($cart as $key => $value) {
                            $totalSum = $totalSum + $cart[$key]['product_price'];
                        }
                        echo '$' . $totalSum;
                    ?>
                </span></h2>
            <div class="line item__line"></div>
            <a href="checkout.html" class="flex__btn item3__btn btn--red">PROCEED TO CHECKOUT</a>
        </div>
    </div>
</div>




<td><a href="../deleteFromCart/deleteFromCart?id=' . $cart[$key]['id'] . '">Удалить</a></td>
