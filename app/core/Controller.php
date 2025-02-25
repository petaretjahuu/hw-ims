<?php

namespace App\Core;

class Controller
{
    // This class can be used as a base controller for other controllers
    // You can add common methods or properties that can be shared across different controllers

    // Example method to load a model
    protected function loadModel($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    // Example method to render a view
    protected function renderView($view, $data = [])
    {
        extract($data);
        require_once '../app/views/' . $view . '.php';
    }
}

?>