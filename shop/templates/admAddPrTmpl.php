<?php
echo "<div class='content_adm'>
        <form action='index.php?c=admin&act=addNewProd' class='commForm' method='post'>
            <p><strong>Добавить товар:</strong></p>
            <p>Введите наименование: <br><input type='text' name='name' maxlength='100' required></p>
            <p>Введите артикул товара: <br><input type='number' name='articul' rows='5' required></p>
            <p>Введите подробное описание: <br><textarea name='opis' rows='5' required></textarea></p>
            <p>Введите цену: <br><input type='number' name='price' maxlength='20' required></p>
            <p><strong>Имя изображения в формате JPEG, PNG или GIF(например, img/1.jpg, img/10.jpg)</strong></p>
            <p><input type='text' name='img' required></p>
            <p><input type='submit' name='add_submit'></p>
        </form>
    </div>";