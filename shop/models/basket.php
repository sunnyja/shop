<?php
//include "sql.php";
include_once '../config/db.php';
class Basket {

    private $link;

    public function __construct() {
        $this->connect();
    }

    private function connect() { //подключение к БД
        try {
            $connect = DB_DRIVER.':host='.DB_HOST.';dbname='.DB_NAME.';port='.PORT;
            $this->link = new PDO($connect,DB_USER,DB_PASS);
        }
        catch (PDOException $e) {
            echo "Error: ".$e->getMessage();
        }
        $this->link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    }

    public function getAllBasket() { //вывод содержимого БД корзины и БД товаров
        $sql = "SELECT * FROM `basket` INNER JOIN `goods` ON basket.id_tov = goods.id";
        $sth = $this->link->query($sql)->fetchAll();
        return $sth;
    }

    public function getCount() { //кол-во наименований в корзине
        $sql = "SELECT COUNT(*) FROM `basket`";
        $sth = $this->link->query($sql)->fetch();
        return $sth;
    }

    public function sumCountBasket() { //кол-во товаров в корзине
        $sql = "SELECT SUM(`count`) FROM `basket`";
        $sth = $this->link->query($sql)->fetch();
        return $sth;
    }

    public function newGoodBasket($id,$count) { //добавление нового товара в корзину
        $sql = "INSERT INTO `basket` (`id_tov`,`count`) VALUES ('$id','$count')";
        $sth = $this->link->exec($sql);
        return $sth;
    }

    public function getOneBasket($id) { //выводит один товар по его id
        $sql = "SELECT * FROM `basket` WHERE `id_tov` = $id";
        $sth = $this->link->query($sql)->fetch();
        return $sth;
    }

    public function updGoodBasket($id,$count) {
        $sql = "UPDATE `basket` SET `count` = $count WHERE `id_tov` = $id";
        $sth = $this->link->exec($sql);
        return $sth;
    }

    public function delGoodBasket($id) {
        $sql = "DELETE FROM `basket` WHERE `id_tov` = $id";
        $sth = $this->link->exec($sql);
        return $sth;
    }

    public function newClient($name,$user_name,$tel,$addr,$oplata) {
        $sql = "INSERT INTO `clients` (`cl_name`,`user_name`,`tel`,`address`,`oplata`) 
                VALUES ('$name','$user_name','$tel','$addr','$oplata')";
        $this->link->exec($sql);
        $sth = $this->link->lastInsertId();
        return $sth;
    }

    public function updIdBasket($id) {
        $sql = "UPDATE `basket` SET `id_cli` = $id";
        $sth = $this->link->exec($sql);
        return $sth;
    }

    public function allFromBasket() {
        $sql = "SELECT * FROM `basket`";
        $sth = $this->link->query($sql)->fetchAll();
        return $sth;
    }

    public function newOrder($id_tov,$id_cl,$user_name,$count) {
        $sql = "INSERT INTO `orders` (`id_tov`,`id_cli`,`user_name`,`count`) VALUES ($id_tov,$id_cl,'$user_name',$count)";
        $q = "UPDATE `orders` SET `status` = 'ожидает обработки'";
        $this->link->exec($sql);
        $this->link->exec($q);
    }

    public function delBasket(){
        $sql = "TRUNCATE TABLE `basket`";
        $this->link->exec($sql);
    }
}