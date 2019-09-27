<?php
if ($_SESSION["user_login"] == 'admin') {
    echo "<div class='admMenu'>
            <ul class='menu'>
                <li><a href='index.php?c=admin&act=orders'>Управление заказами</a></li>
                <li><a href='index.php?c=admin&act=addProduct'>Добавить товар</a></li>        
            </ul>
          </div>";
}