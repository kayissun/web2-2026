<?php
class Controller {

    public function view($view, $data = []) {
        extract($data);

        $content = __DIR__ . "/../app/views/" . $view . ".php";
        require_once __DIR__ . "/../app/views/layouts/main.php";
    }

    public function viewAuth($view, $data = []) {
        extract($data);
        require_once __DIR__ . "/../app/views/" . $view . ".php";
    }

    public function model($model) {
        require_once __DIR__ . "/../app/models/" . $model . ".php";
        return new $model;
    }

    
}