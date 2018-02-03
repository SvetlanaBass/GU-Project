<h1>Корзина</h1>
<form action="#" method="POST">
    <table class="cart">
        <tr>
            <th>№</th>
            <th>ID товара</th>
            <th>Название товара</th>
            <th>Цена товара за штуку</th>
            <th>Количество штук</th>
            <th>Действие</th>
        </tr>
        <?php
            $nr = 0;
            foreach ($cart as $key => $value){
                $nr += 1;
                echo '<tr>
                        <td>'.$nr.'</td>
                        <td>'.$cart[$key]['id_product'].'</td>
                        <td>'.$cart[$key]['product_name'].'</td>
                        <td>'.$cart[$key]['product_price'].' $</td>
                        <td>'.$cart[$key]['quantity'].'</td>
                        <td><a href="../deleteFromCart/deleteFromCart?id=' . $cart[$key]['id'] . '">Удалить</a></td>
                      </tr>';
            }
        ?>
    </table>
    <h3>Общая сумма заказа:
        <?php
            foreach ($cart as $key => $value) {
                $totalSum = $totalSum + $cart[$key]['product_price'];
            }
            echo $totalSum . ' $';
        ?>
    </h3>
    <input type="submit" value="Оформить заказ">
</form>
<a href="../catalog/catalog">Вернуться в каталог</a><br><br>