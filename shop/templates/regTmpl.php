<div class="registr">
    <form class="register" method="post">
        <p>Логин: <input type="text" name="login" maxlength="30" placeholder="Введите Логин" autofocus required></p>
        <p>Пароль: <input type="password" minlength="2" name="pass" placeholder="Введите Пароль" required></p>
        <input type="submit" name="submit" value="Зарегистрироваться">
    </form>
</div>
<p class="mess"><?php if(isset($text)){echo $text;}?></p>