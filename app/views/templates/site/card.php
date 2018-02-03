<?php /** @var \app\models\Product $product */ ?>
<a class="btn" href="../cart/cart?id=<?=$product->id_product?>">Корзина</a><br><br>
<h3>Карточка товара</h3>
<p>ID товара: <?=$product->id_product?></p>
<h1><?=$product->product_name?></h1>
<h2>Цена товара: <?=$product->product_price?> $</h2>
<a class="btn" href="../delete/delete?id=<?=$product->id_product?>">Удалить товар из базы данных</a>
<a class="btn" href="../addToCart/addToCart?id=<?=$product->id_product?>">Добавить в корзину</a><br><br>
<a href="../catalog/catalog">Вернуться в каталог</a><br><br>