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
                <a class="cart" href="#"></a>
                <a class="btn" href="?register/RenderRegisterPage">Create Account</a>
                <a class="btn" href="#">Login</a>
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
            <h4>CHOOSE COLOR</h4>
            <h4>CHOOSE SIZE</h4>
            <h4>QUANTITY</h4>
        </div>
        <div class="filters">
            <div class="filter-color">
                <span class="color"></span>
                <span class="color-title">Red</span>
                <i class="icon-down-open"></i>
            </div>
            <div class="filter-sise">
                XXL
                <i class="icon-down-open"></i>
            </div>
            <input class="filter-qty" type="text" placeholder="2">
        </div>
        <a href="?addToCart/addToCart?id=<?=$product->id_product?>" class="addtobasket">Add to Cart</a>
    </section>
    <section>
        <div class="content feturedItems1">

        </div>



<!--<a class="btn" href="../cart/cart?id=--><?//=$product->id_product?><!--">Корзина</a><br><br>-->
<!--<h3>Карточка товара</h3>-->
<!--<p>ID товара: --><?//=$product->id_product?><!--</p>-->
<!--<h1>--><?//=$product->product_name?><!--</h1>-->
<!--<h2>Цена товара: --><?//=$product->product_price?><!-- $</h2>-->
<!--<a class="btn" href="../delete/delete?id=--><?//=$product->id_product?><!--">Удалить товар из базы данных</a>-->
<!--<a class="btn" href="../addToCart/addToCart?id=--><?//=$product->id_product?><!--">Добавить в корзину</a><br><br>-->
<!--<a href="../catalog/catalog">Вернуться в каталог</a><br><br>-->
