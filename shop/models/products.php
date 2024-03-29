<?php
//include "sql.php";
include_once '../config/db.php';
class Goods {
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

   public function getallProd() { //товары в каталоге
        $sql = "SELECT * FROM `goods`";
        $sth = $this->link->query($sql)->fetchAll();
        return $sth;
    }

   public function getstartProd() { //товары на главной странице
        $sql = "SELECT * FROM `goods` WHERE id BETWEEN 0 AND 4";
        $sth = $this->link->query($sql)->fetchAll();
        return $sth;
    }

   public function getOneProd($id) { //просмотр отдельного товара
        $sql = "SELECT * FROM `goods` WHERE id = $id";
        $sth = $this->link->query($sql)->fetch();
        return $sth;
    }
}
