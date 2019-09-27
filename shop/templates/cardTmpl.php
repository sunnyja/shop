<?php
if (isset($goods)){?>
    <div class="prodItem">
            <img class="prodImage" src="../lib/<?=$goods['image']?>" alt="pic">
            <p class="prodZag"><?=$goods['name']?></p>
            <p class="prodArtic">арт. <?=$goods['articul']?></p>
            <p class="prodArtic"><?=$goods['opis']?></p>
            <p class="artic pr"><?=$goods['price']?> руб.</p>
            <a class="add-to-basket" href="index.php?c=page&act=addToBasket&id=<?=$goods['id']?>" title="Добавить в корзину">Добавить в корзину</a>
            <?php
            if (isset($_SESSION['user_login']) && $_SESSION['user_login'] == 'admin') {
                echo  "<a class='add-to-basket' href='index.php?c=admin&act=updProduct&id=$goods[id]'>Редактировать товар</a>
                  <a class='add-to-basket' href='index.php?c=admin&act=delProduct&id=$goods[id]'>Удалить товар</a>";
            }?>
    </div>
    <?}?>