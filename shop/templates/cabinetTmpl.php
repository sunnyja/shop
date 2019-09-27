<?php
if (!empty($order)) {
    echo "<table class='basTab'>
                <tr class='ztab'>
                    <td>Наименование товара</td>
                    <td>Цена</td>
                    <td>Количество</td>
                    <td>Стоимость</td>
                    <td>Статус заказа</td>
                </tr>";
    foreach ($order as $val) {
        $sum = $val['price'] * $val['count'];
        $summ += $val['price'] * $val['count'];
        echo   "<tr>
                    <td>
                        <details class='detail'>
                            <summary>$val[name]</summary>
                            <img src='../lib/$val[image]' alt='pict'>
                            <p>$val[opis]</p>
                        </details>
                    </td>                        
                    <td>$val[price] руб.</td>
                    <td>$val[count]</td>
                    <td>$sum руб.</td>
                    <td>$val[status]</td>
               </tr>";
    }
    echo "<tr class='ztab'>
                <td></td>
                <td></td>
                <td></td>
                <td>Общая сумма: $summ</td>
                <td><strong> руб.</strong></td>
              </tr>
          </table>";
}