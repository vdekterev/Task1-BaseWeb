<?php
/*
 * Base Controller
 * Loads Models & Views
 */

class Controller
{
    public function model(string $model): object
    {
        $model = ucwords($model);
        require_once "../app/models/{$model}.php";
        return new $model;
    }

    public function view(string $view, array $data = []): void
    {
        if (file_exists("../app/views/{$view}.php")) {
            require_once "../app/views/{$view}.php";
        } else {
            die("View: {$view} does not exist");
        }
    }
}