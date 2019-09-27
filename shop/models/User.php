<?php
session_start();
include_once '../config/db.php';

	class Users {
		public $user_id, $user_login, $user_password;
        private $link;

		public function __construct () {
            $this->connect();
		}

		public function encryptPass($password) {
			return md5($password);
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

		public function get($login) {
		    $sql = "SELECT * FROM `users` WHERE login = '$login'";
			return $this->link->query($sql)->fetch();
		}

		public function newReg ($login, $password) { //регистрация нового пользователя
		    $sql = "SELECT * FROM `users` WHERE login = '$login'";
            $user = $this->link->query($sql)->fetch();
            if ($login == 'admin' && $user['login'] == $login) {
                return 'логин занят';
            }
            if (!$user) {
                $sql = "INSERT INTO `users` (`login`,`pass`) VALUES ('$login','$password')";
                $this->link->exec($sql);
                return 'Вы зарегистрированы';
            } else {
                return false;
            }
        }

		public function login($login, $password) {
		    $sql = "SELECT * FROM `users` WHERE login = '$login'";
			$user = $this->link->query($sql)->fetch();
			if ($user) {
				if ($user["pass"] == $this->encryptPass($password)) {
    				$_SESSION["user_login"] = $user["login"];
    				$_SESSION["user_pass"] = $user["pass"];
                    header("Location: ../public/index.php?c=user&act=cabinet");
    				return "Здравствуйте, ".$user["login"]." !";
				} else {
					return "Пароль не верный!";
				}
			} else {
				return "Пользователь с таким логином не зарегистрирован!";
			}
		}

        public function getAllBasket($name) { //вывод содержимого БД заказов и БД товаров
            $sql = "SELECT * FROM `orders` INNER JOIN `goods` ON orders.id_tov = goods.id WHERE orders.user_name = '$name'";
            $sth = $this->link->query($sql)->fetchAll();
            return $sth;
        }

		public function logout() {
			if (isset($_SESSION["user_login"])) {
				$_SESSION["user_login"]=null;
				session_destroy();
                header("Location: ../public/index.php");
				return true;
			}
			return false;
		}
	}