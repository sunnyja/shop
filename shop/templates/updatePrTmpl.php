<?php
if (isset($goods)) {
    echo
    "<div class='content_adm'>
        <form action='index.php?c=admin&act=updatePr&id=$goods[id]' method='post'>
            <p class='upd'><strong>Редактировать описание товара:</strong></p>
            <img class='prodImage' src='../lib/$goods[image]' alt='pic'>
            <p class='updStr'>Адрес изображения<br><input type='text' name='img' value='$goods[image]'></p>
            <p class='updStr'>Наименование товара<br><input type='text' name='prname' value='$goods[name]'></p>
            <p class='updStr'>Артикул товара<br><input type='number' name='prart' value='$goods[articul]'></p>
            <p class='updStr'>Описание товара<br><input type='text' name='opis' value='$goods[opis]'></p>
            <p class='updStr'>Стоимость товара<br><input type='number' name='price' value='$goods[price]'></p>
            <input type='submit' name='redakt' value='сохранить изменения'>
        </form>
    </div>";
}