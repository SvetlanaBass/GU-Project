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
                    if(isset($_COOKIE['site_hash']) && isset($_COOKIE['site_login'])){
                        echo '<a class="cart" href="#"></a>
                              <a class="btn" href="#">' . $_COOKIE['site_login'] . '</a>
                              <a class="btn" href="?logout/logout">Log out</a>';
                    } else {
                        echo '<a class="cart" href="#"></a>
                                  <a class="btn" href="?register/RenderRegisterPage">Create Account</a>
                                  <a class="btn" href="?login/RenderLoginPage">Login</a>';
                    }
                ?>
            </div>
        </div>
    </header>
    <nav id="menu"></nav>
    <a class="btn" href="../cart/cart?id=<?=$product->id_product?>">Корзина</a>
    <a class="btn" href="../save/save">Добавить или обновить продукт</a>
    <h1>Каталог</h1>
    <div class="content feturedItems__gallery">
        <?php
        foreach ($products as $product){
            echo '<a href="?product/card?id='.$product->id_product.'" class="gallery-item">
                        <img src="'.$product->product_img.'" alt="goods">
                        <p class="good-title">'.$product->product_name.'</p>
                        <p class="good-price">$'.$product->product_price.'</p>
                  </a>';
        }
        ?>
    </div>
</div>

