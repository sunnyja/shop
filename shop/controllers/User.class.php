<?php
	include_once '../models/User.php';

	class User extends Base {
	    private $newUser;

	    public function __construct() {
	        parent::__construct();
            $this->newUser = new Users;
        }

        public function action_cabinet() {
            $user = $this->newUser->get($_SESSION["user_login"]);
            $this->title .= $user['login'];
            if (isset($_SESSION["user_login"])) {
                $name = $_SESSION["user_login"];
                $order = $this->newUser->getAllBasket($name);
                $this->title .= ' личный кабинет';
                        $this->content = $this->Template('../templates/cabinetTmpl.php',
                            ['order' => $order]);
                        if ($name == 'admin') {
                            $this->content = $this->Template('../templates/adminTmpl.php',[]);
                        }
            }
	    }
		
		public function action_reg() {
			$this->title .= 'Регистрация';
			$this->content = $this->Template('../templates/regTmpl.php', array());
			if (isset($_POST['submit'])) {
			    if ((!empty($_POST['login'])) && (!empty($_POST['pass']))) {
			        $login = $_POST['login'];
			        $password = $_POST['pass'];
                    $result = $this->newUser->newReg($login, md5($password));
                }
				if ($result) {
					$this->content = $this->Template('../templates/regTmpl.php', array(
					    'text' => $result
                    ));
				} else {
					$this->content = $this->Template('../templates/regTmpl.php', array(
					    'text' => $result
                    ));
				}
			}
		}

		public function action_log() {
			$this->content = $this->Template('../templates/loginTmpl.php', array(
                $this->title = 'Вход на сайт'
            ));
			if(isset($_POST['enter'])) {
                $login = $_POST['login'];
                $password = $_POST['pass'];
				$result = $this->newUser->login($login, $password);
				if ($result) {
                    $this->content = $this->Template('../templates/loginTmpl.php', array(
                        'text' => $result
                    ));
				} else {
					$this->content = $this->Template('../templates/loginTmpl.php', array(
					    'text' => $result
                    ));
				}
			}
		}

		public function action_out() {
			$this->newUser->logout();
		}
	}