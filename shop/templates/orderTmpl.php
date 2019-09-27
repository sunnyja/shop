<div class="order">
     <form class="orderForm" action="index.php?c=page&act=order" method="post" name="order">
        <p>Введите Ваши имя и фамилию</p>
        <input required autofocus type="text" name="name"><br>

        <p>Введите Ваш номер телефона в формате 7ХХХХХХХХХХ</p>
        <input required autofocus type="tel" name="telephone" pattern="7[0-9]{10}"><br>

        <p>Введите Ваш адрес: город, улица, дом, квартира, почтовый индекс</p>
        <textarea required class="address" autofocus type="text" name="address" cols="50" rows="10"></textarea><br>

        <p>Варианты оплаты:</p>
        <p><input required type="radio" name="oplata" value="безналичная оплата" checked>безналичная оплата
            <i class="fa fa-cc-mastercard fa-lg" aria-hidden="true"></i>
            <i class="fa fa-cc-visa fa-lg" aria-hidden="true"></i>
        </p>

        <p><input required type="radio" name="oplata" value="при получении товара">при получении
            <i class="fa fa-money fa-lg" aria-hidden="true"></i>
       </p>

        <input class="goOrder" type="submit" name="goOrder" value="отправить заказ">
     </form>
</div>
