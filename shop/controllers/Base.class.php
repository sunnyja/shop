<?php
session_start();

include_once '../models/User.php';
include_once '../models/basket.php';
class Base extends Controller {
	protected $title;
	protected $content;
	protected $user;
  
	protected function before()	{
		$this->title = '';
		$this->content = '';
	}
	public function __construct() {
        $this->user = new Users;
    }

    public function render() {
        if (isset($_SESSION["user_id"])) {
            $user_info = $this->user->get($_SESSION["user_id"]);
        } else {
            $user_info["login"] = false;
        }
            $page = $this->Template('../templates/mainTmpl.php',
             ['title' => $this->title,
              'content' => $this->content,
              'user' => $user_info["login"],
             ]
            );
            echo $page;
	}
}
