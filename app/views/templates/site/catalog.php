<?php /** @var \app\models\Product $product */ ?>
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


