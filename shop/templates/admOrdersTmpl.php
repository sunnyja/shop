<?php
if (!empty($order)) {
    echo "<table class='basTab'>
                <tr class='ztab'>
                    <td>Заказчик(login)/Товар</td>
                    <td>Номер телефона</td>
                    <td>Адрес доставки</td>
                    <td>количество/полная стоимость заказа</td>
                    <td>Статус заказа</td>
                </tr>";
    foreach ($order as $val) {
            $sum = $val['price'] * $val['count'];
            $summ += $val['price'] * $val['count'];
            echo "<tr>
                    <td>
                        <details class='detail'>
                            <summary>
                                $val[cl_name]($val[user_name])
                            </summary>
                                <p>$val[name]</p>
                                <img src='../lib/$val[image]' alt='pic'>                        
                        </details>
                    </td>
                    <td>$val[tel]</td>
                    <td>$val[address]</td>
                    <td>$val[count]|  $sum</td>
                    <td>
                        <form action='index.php?c=admin&act=status' method='post'>
                            <select name='track' id='track'>
                                <option value='$val[status]'>$val[status]</option>
                                <option value='в работе'>в работе</option>
                                <option value='выполнено'>выполнено</option>
                            </select>
                            <input type='hidden' name='id' value='$val[id_cli]'>
                            <input type='submit' name='ok' value='OK'>
                        </form>                    
                    </td>                       
                 </tr>";
        }
    echo "<tr class='ztab'>
                <td></td>
                <td></td>
                <td></td>
                <td>Общая сумма заказов: <p class='zak'><strong>$summ руб.</strong></p></td>
                <td></td>
              </tr>
          </table>";
}