<?php /** @var \app\models\Product $product */ ?>
<a class="btn" href="../cart/cart?id=<?=$product->id_product?>">Корзина</a>
<a class="btn" href="../save/save">Добавить или обновить продукт</a>
<h1>Каталог</h1>
<div class="container-gallery">
    <?php
        foreach ($products as $product){
            echo '<a href="../product/card?id='.$product->id_product.'" class="container-product">
                    <p class="name">'.$product->product_name.'</p>
                    <p class="price">Цена товара: '.$product->product_price.' $</p>
                  </a>';
        }
    ?>
</div>


