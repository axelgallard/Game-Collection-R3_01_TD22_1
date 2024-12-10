<?php

class Controller{

    private Model $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        include 'views/main.php';
    }

    public function connection() {
        include 'views/connection.php';
    }
}
?>