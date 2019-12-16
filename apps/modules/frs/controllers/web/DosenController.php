<?php

namespace Kel5\FRS\Controllers\Web;

use Phalcon\Mvc\Controller;

class DosenController extends Controller
{
    public function indexAction()
    {
        return $this->view->pick('dosen/home');
    }


    public function kelasAction()
    {
        return $this->view->pick('kelas');
    }

    public function frsAction()
    {
        return $this->view->pick('dosen/frs');
    }

    public function setujuifrsAction()
    {
        return $this->view->pick('dosen/frs');
    }
}
