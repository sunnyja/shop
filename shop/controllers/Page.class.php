<?php
include "../models/products.php";
include "../models/basket.php";
class Page extends Base {
   private $q;
   private $m;

   public function __construct() {
        $this->q = new Goods;
        $this->m = new Basket;
    }

   public function action_index(){ //главная страница с содержимым
        $goods = $this->q->getstartProd();
            $this->title .= 'Главная';
            $this->content = $this->Template('../templates/indexTmpl.php',
                ['goods' => $goods]
            );
    }
	
public function action_showBasket(){ //вывод товаров корзины
        $goods = $this->m->getAllBasket();
        $nameCount = $this->m->getCount(); //кол-во наименований
        $sumCount = $this->m->sumCountBasket(); //кол-во товаров
        foreach ($nameCount as $value) {
            foreach ($sumCount as $count) {
                $_SESSION['count'] = $count;
                $this->title .= 'Корзина';
                $this->content = $this->Template('../templates/basketTmpl.php',
                    ['goods' => $goods,
                     'value' => $value,
                     'count' => $count]
                );
            }
        }
	}

public function action_delBasket() { //удаление товаров из корзины
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $pr = $this->m->getOneBasket($id);
            if ($pr) {
                $count = $pr['count'];
                if ($count > 0 && $count !== 0) {
                    $count = $count - 1;
                    $this->m->updGoodBasket($id, $count);
                }
                if ($count == 0) {
                    $this->m->delGoodBasket($id);
                }
            } $this->action_showBasket();
        }
    }

public function action_addToBasket() { //добавление товара в корзину
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $pr = $this->m->getOneBasket($id);
            if ($pr) {
                $t = $pr['id_tov'];
                $count = $pr['count'];
                $count++;  //если товар уже есть, то кол-во увелич. на 1
                $this->m->updGoodBasket($t, $count);
            } else {
                $count = 1;  //если товара нет еще, то после добавления кол-во равно 1
                $this->m->newGoodBasket($id, $count);
            }
        } $this->action_showBasket();
    }

public function action_catalog() { //вывод товаров в каталог
        $goods = $this->q->getallProd();
        $this->content = $this->Template('../templates/catalogTmpl.php',
            [$this->title = 'Каталог товаров',
            'goods' => $goods]
        );
    }

public function action_prodCard() { //карточка отдельного товара
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $goods = $this->q->getOneProd($id);
            $this->content = $this->Template('../templates/cardTmpl.php',
                [$this->title = 'Описание товара',
                'goods' => $goods]
            );
        }
    }

public function action_orderIssue() { //страница оформления заказа
        $this->title .= 'Оформление заказа';
        $this->content = $this->Template('../templates/orderTmpl.php',
            []
        );
    }

public function action_order() {
        if (isset($_POST['goOrder'])) {
            if (!empty(trim(strip_tags($_POST['name'])))) {
                $name = $_POST['name']; //имя и фамилия заказчика
            }
            if (!empty($_POST['telephone'])) {
                $tel = $_POST['telephone']; //номер телефона заказчика
            }
            if (!empty(trim(strip_tags($_POST['address'])))) {
                $addr = $_POST['address']; //почтовый адрес заказчика
            }
            if (!empty($_POST['oplata'])) {
                $oplata = $_POST['oplata']; //вид оплаты (наличными/безналичный)
            }
            if (isset($_SESSION['user_login'])) {
                $user_name = $_SESSION['user_login']; //логин зарегистрир.пользователя (если он делает заказ)
            }
            //добавляем нового заказчика и его данные в таблицу с данными о заказчиках clients
            $id_cli = $this->m->newClient($name,$user_name,$tel,$addr,$oplata); //обратно получаем id нового заказчика

            //добавляем id заказчика ко всем позициям товаров в корзине
            $this->m->updIdBasket($id_cli);

            //переносим данные из корзины в таблицу с заказами
            $q = $this->m->allFromBasket();
            foreach ($q as $item) {
                $id_tov = $item['id_tov'];
                $id_cl = $item['id_cli'];
                $count = $item['count'];
                $this->m->newOrder($id_tov,$id_cl,$user_name,$count);
            }

            //очищаем содержимое корзины
            $this->m->delBasket();
        }
        $this->title .= 'Ваш заказ отправлен!';
        $this->content = $this->Template('../templates/goOrderTmpl.php',[]);
    }
}
