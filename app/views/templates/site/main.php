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
    <div class="slider">
        <div class="content content__slider">
            <div class="slide fade">
                <img src="img/slide1.jpg" alt="image">
                <div class="slider__text">
                    <h1>THE BRAND</h1>
                    <p>OF LUXERIOUS <span>FASHION</span></p>
                </div>
            </div>
            <div class="slide fade">
                <img src="img/slide2.jpg" alt="image">
            </div>
            <div class="slide fade">
                <img src="img/slide3.jpg" alt="image">
                <div class="slider__text">
                    <h1>THE BRAND</h1>
                    <p>OF LUXERIOUS <span>FASHION</span></p>
                </div>
            </div>
            <div>
                <span class="dot" onclick="currentSlide(0)"></span>
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
            </div>
        </div>
    </div>
    <section>
        <div class="content feturedItems">
            <h2>Fetured Items</h2>
            <p>Shop for items based on what we featured in this week</p>
        </div>
        <div class="content feturedItems__gallery">
            <?php
            $i = 1;
            foreach ($products as $product){
                echo '<a href="?product/card?id='.$product->id_product.'" class="gallery-item">
                        <img src="'.$product->product_img.'" alt="goods">
                        <p class="good-title">'.$product->product_name.'</p>
                        <p class="good-price">$'.$product->product_price.'</p>
                     </a>';
                $i++;
                if($i === 9){break;}
            }
            ?>
        </div>
        <div class="content">
            <a class="linkToCatalog" href="?catalog/catalog">
                Browse All Products&nbsp;<i class="icon-right"></i>
            </a>
        </div>
    </section>
    <section class="features">
        <div class="content">
            <article class="discount-features__item1">
                <h3>Free Delivery</h3>
                <p>
                    Worldwide delivery on all. Authorit
                    tively morph next-geneation innov
                    tion with extensive models.
                </p>
            </article>
            <article class="discount-features__item2">
                <h3>Sales &amp; discounts</h3>
                <p>
                    Worldwide delivery on all. Authorit
                    tively morph next-geneation innov
                    tion with extensive models.
                </p>
            </article>
            <article class="discount-features__item3">
                <h3>Quality assurance</h3>
                <p>
                    Worldwide delivery on all. Authorit
                    tively morph next-geneation innov
                    tion with extensive models.
                </p>
            </article>
        </div>
    </section>
</div>