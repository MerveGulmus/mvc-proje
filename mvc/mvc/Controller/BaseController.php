<?php

class BaseController
{

    public function view($name, $data = [])
    {
        extract($data);
        require __DIR__ . '/../View/' . strtolower($name) . '.php';
    }

    public function model($name)
    {
        require __DIR__ . '/../Model/' . strtolower($name) . '.php';
        return new $name();
    }
}