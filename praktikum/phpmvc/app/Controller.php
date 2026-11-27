<?php

class Controller {

    // Memanggil View
    public function view($view, $data = [])
    {
        extract($data);

        require_once __DIR__ . '/../views/' . $view . '.php';
    }

    // Memanggil Model
    public function model($model)
    {
        require_once __DIR__ . '/../models/' . $model . '.php';

        return new $model;
    }

}
