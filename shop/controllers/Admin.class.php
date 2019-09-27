<?php
include_once '../models/admin.php';

class Admin extends Base {
    private $adm;

    public function __construct() {
        parent::__construct();
        $this->adm = new Adm;
    }

    public function action_orders(){ //страница управление заказами
        $order = $this->adm->getAllBasket();
        $this->title .= 'Управление заказами';
        $this->content = $this->Template('../templates/admOrdersTmpl.php',
            ['order' => $order]
        );
    }

    public function action_status(){ //изменение статуса заказа
        if (isset($_POST['ok'])) {
            $track = $_POST['track'];
            $id = $_POST['id'];
            $this->adm->addStatus($id,$track);
        }
        $this->action_orders();
    }

    public function action_addProduct(){ //страница добавление нового товара
        $this->title .= 'Добавление нового товара на сайт';
        $this->content = $this->Template('../templates/admAddPrTmpl.php',
            []
        );
    }

    public function action_addNewProd() { //добавление товара
        if (isset($_POST['add_submit'])){
            $name = $_POST['name'];
            $articul = $_POST['articul'];
            $opis = $_POST['opis'];
            $price = $_POST['price'];
            $image = $_POST['img'];
            $this->adm->addProd($name,$articul,$opis,$price,$image);
        }
        header("Location: ../public/index.php?c=page&act=catalog");
    }

    public function action_delProduct(){ //удаление товара
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->adm->delProd($id);
        }
        header("Location: ../public/index.php");
    }

    public function action_updProduct(){ //страница обновление описания товара
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $goods = $this->adm->getOneProd($id);
            $this->title .= 'Редактирование информации о товаре';
            $this->content = $this->Template('../templates/updatePrTmpl.php',
                ['goods' => $goods]
            );
        }
    }

    public function action_updatePr() { //изменение данных о товаре
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        if (isset($_POST['redakt'])) {
            $img = $_POST['img'];
            $name = $_POST['prname'];
            $art = $_POST['prart'];
            $opis = $_POST['opis'];
            $price = $_POST['price'];
            $this->adm->update($img,$name,$art,$opis,$price,$id);
        }
        header("Location: ../public/?c=page&act=prodCard&id=$id");
    }
}