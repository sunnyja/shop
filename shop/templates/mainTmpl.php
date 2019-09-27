<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/font/css/font-awesome.min.css">
    <script src="../lib/js/jquery.js"></script>
</head>
<body>
<header>
    <div class="headTitle">
       <h1><?=$title?></h1>
    </div>
</header>
<nav>
	<div class="headmenu">
		<a href="index.php">Главная</a>
		<a href="index.php?c=page&act=catalog">Каталог</a>
       <a href="index.php?c=page&act=showBasket">Корзина <span class="countBasket"><?=$_SESSION['count']?></span>
           <span><?php if (empty($_SESSION['count'])) {$_SESSION['count'] = 0;}?></span></a>
		<?php
			if ($_SESSION["user_login"]) {
                echo "<a href='index.php?c=user&act=cabinet'>Личный кабинет " . $_SESSION['user_login'] . "</a>
                      <a href='index.php?c=user&act=out'>Выйти(" . $_SESSION['user_login'] . ")</a>";

            } else {
                echo "<a href='index.php?c=user&act=log'>Войти</a>
                      <a href='index.php?c=user&act=reg'>Регистрация</a>";
            }
		?>
	</div>
</nav>
	<div class="content">
		<?=$content?>
	</div>
<footer>
    <p class="foot">Copyright &#169; <?= date('Y')?></p>
</footer>
</body>
</html>
