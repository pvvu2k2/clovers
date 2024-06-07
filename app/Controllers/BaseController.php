<?php

class BaseController
{
    public function renderViewAdmin($view, $data)
    {
        $view = './Views/' . $view . '.php';
        require_once $view;
    }

    public function renderView($view, $data)
    {
        $view = './app/Views/' . $view . '.php';
        require_once $view;
    }
}