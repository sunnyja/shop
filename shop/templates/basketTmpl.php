<?php
if (!empty($goods)) {
    echo "<table class='basTab'>
                <tr class='ztab'>
                    <td>Наименование товара</td>
                    <td>Цена</td>
                    <td>Количество</td>
                    <td>Стоимость</td>
                    <td></td>
                </tr>";
    foreach ($goods as $key => $val) {
        $sum = $val['price'] * $val['count'];
        $summ += $val['price'] * $val['count'];
        echo "<tr>
                <td><h4 class='item-name'><a href='index.php?c=page&act=prodCard&id=$val[id]'>$val[name]</a></h4></td>
                <td>$val[price] руб.</td>
                <td>$val[count]</td>
                <td>$sum руб.</td>
                <td><a class='delgoods' href='index.php?c=page&act=delBasket&id=$val[id]'>Удалить товар</a></td>
              </tr>";
    }
    if ((isset($value)) && (isset($count))) {
        echo "<tr class='ztab'>
                <td>Количество наименований: $value</td>
                <td></td>
                <td>Количество товаров: $count</td>
                <td>Общая сумма: </td>
                <td><strong>$summ руб.</strong></td>
              </tr>
          </table>
          <a class='delgoods' href='index.php?c=page&act=orderIssue'>Оформить заказ</a>
          <p class='basket0'>Для добавления товара в корзину перейдите в наш <a href='index.php?c=page&act=catalog'>каталог</a>";
    }
}
else {
        echo "<div class='basket'>
                <p class='basket0'>Ваша корзина пуста</p>
                <i class='fa fa-shopping-basket fa-3x' aria-hidden='true'></i>
                <p class='basket0'>Для добавления товара в корзину перейдите в наш <a href='index.php?c=page&act=catalog'>каталог</a>
            </div>";
}