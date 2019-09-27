<?php
if (isset($goods)){
foreach ($goods as $key => $val){?>
<div class="item">
    <img class="images" src="../lib/<?=$val['image']?>" alt="pic">
    <a class="zg" href="index.php?c=page&act=prodCard&id=<?=$val['id']?>""><p class="zag"><?=$val['name']?></p></a>
    <p class="artic">арт. <?=$val['articul']?></p>
    <p class="artic pr"><?=$val['price']?> руб.</p>
    <a class="add-to-basket" href="index.php?c=page&act=addToBasket&id=<?=$val['id']?>" title="Добавить в корзину">Добавить в корзину</a>
    <?php
    if (isset($_SESSION['user_login']) && $_SESSION['user_login'] == 'admin') {
        echo  "<a class='add-to-basket' href='index.php?c=admin&act=updProduct&id=$val[id]'>Редактировать товар</a>
              <a class='add-to-basket' href='index.php?c=admin&act=delProduct&id=$val[id]'>Удалить товар</a>";
    }?>
</div>
<?}}?>