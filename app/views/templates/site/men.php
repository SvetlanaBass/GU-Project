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
            <h1>MEN</h1>
            <h3>HOME &#47; <span> MEN</span></h3>
        </div>
    </div>
    <div class="content feturedItems__gallery">
        <?php
        foreach ($products as $product){
            if($product->gender === "men"){
                echo '<a href="?product/card?id='.$product->id_product.'" class="gallery-item">
                        <img src="'.$product->product_img.'" alt="goods">
                        <p class="good-title">'.$product->product_name.'</p>
                        <p class="good-price">$'.$product->product_price.'</p>
                  </a>';
            }
        }
        ?>
    </div>
</div>