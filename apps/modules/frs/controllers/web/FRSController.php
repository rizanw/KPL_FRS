<?php

use Phalcon\Mvc\Controller;


class FRSController extends Controller
{
    public function indexAction()
    {
        return $this->view->pick('home');
    }

}