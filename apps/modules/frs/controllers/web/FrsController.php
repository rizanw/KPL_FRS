<?php

namespace Kel5\FRS\Controllers\Web;

use Phalcon\Mvc\Controller;

class FrsController extends Controller
{
    public function indexAction()
    {
        return $this->view->pick('mahasiswa/home');
    }

    public function frsAction()
    {
        return $this->view->pick('mahasiswa/frs');
    }

    public function dropkelasAction()
    {
        # code...
        return $this->view->pick('mahasiswa/home');
    }

    public function cetakAction()
    {
        # code...
        return $this->view->pick('mahasiswa/cetak');
    }

    public function kelasAction()
    {
        return $this->view->pick('kelas');
    }
}
