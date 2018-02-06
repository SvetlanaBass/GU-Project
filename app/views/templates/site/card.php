<?php /** @var \app\models\Product $product */ ?>
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
                        echo '<a class="cart" href="#">
                                <div class="goods-in-cart content__goods-in-cart">'.$goodsInCart.'</div>
                              </a>
                              <span class="btn__name">' . $_COOKIE['site_login'] . '</span>
                              <a class="btn" href="?logout/logout">Log out</a>';
                    } else {
                        echo '<a class="cart" href="#">
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
            <h1>NEW ARRIVALS</h1>
            <h3>HOME &#47; <?=$product->gender?> &#47; <span> NEW ARRIVALS</span></h3>
        </div>
    </div>
    <div class="slider-product">
        <div class="content">
            <img src="<?=$product->product_img?>" alt="product-image">
        </div>
    </div>
    <section class="description">
        <h3><?=$product->gender?> collection</h3>
        <div class="line"></div>
        <h2><?=$product->product_name?></h2>
        <p class="description__detailed">
            Compellingly actualize fully researched processes before proactive
            outsourcing. Progressively syndicate collaborative architectures
            before cutting-edge services. Completely vizualize parallel core
            competencies rather than exceptional portals.
        </p>
        <div class="description__short">
            <h4>MATERIAL:<span>COTTON</span></h4>
            <h4>DESIGNER:<span>BINBURHAN</span></h4>
        </div>
        <h5>$ <?=$product->product_price?></h5>
        <div class="filter-titles">
            <h4>QUANTITY</h4>
        </div>
        <div class="filters">
            <input class="filter-qty" type="text" placeholder="2">
        </div>
        <p class="loginMessage">Please log into your account using the link in the upper right corner.</p>
        <p class="addtobasket" onclick="refreshCart()">Add to Cart</p>
<!--        <a href="?addToCart/addToCart?id=--><?//=$product->id_product?><!--" class="addtobasket" onclick="refreshCart()">Add to Cart</a>-->
    </section>
</div>
