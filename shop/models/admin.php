<?php
session_start();
include_once '../config/db.php';

class Adm {
    public $user_id, $user_login, $user_password;
    private $link;

    public function __construct() {
        $this->connect();
    }

    public function encryptPass($password) {
        return md5($password);
    }

    private function connect() { //подключение к БД
        try {
            $connect = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';port=' . PORT;
            $this->link = new PDO($connect, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $this->link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function getAllBasket() { //вывод содержимого БД заказов и БД товаров
        $sql = "SELECT * FROM `orders` JOIN `goods` ON orders.id_tov = goods.id JOIN `clients` ON clients.id = orders.id_cli";
        $sth = $this->link->query($sql)->fetchAll();
        return $sth;
    }

    public function addStatus($id,$track){
        $sql = "UPDATE `orders` SET `status` = '$track' WHERE `id_cli` = $id";
        $this->link->exec($sql);
    }

    public function addProd($name,$articul,$opis,$price,$image){
        $sql = "INSERT INTO `goods` (`name`,`articul`,`opis`,`price`,`image`) VALUES ('$name',$articul,'$opis',$price,'$image')";
        $this->link->exec($sql);
    }

    public function delProd($id){
        $sql = "DELETE FROM `goods` WHERE `id` = $id";
        $this->link->exec($sql);
    }

    public function update($img,$name,$art,$opis,$price,$id){
        $sql = "UPDATE `goods` SET `image` = '$img',`name` = '$name',`articul` = $art,`opis` = '$opis',`price` = $price WHERE `id` = $id";
        $this->link->exec($sql);
    }

    public function getOneProd($id) { //просмотр отдельного товара
        $sql = "SELECT * FROM `goods` WHERE id = $id";
        $sth = $this->link->query($sql)->fetch();
        return $sth;
    }
}