<?php

namespace Kel5\FRS\Controllers\Web;

use Phalcon\Mvc\Controller;

class FrsController extends Controller
{
    public function indexAction()
    {
         return $this->view->pick('home');
    }

    public function frsAction()
    {
        return $this->view->pick('kelas');
    }
}