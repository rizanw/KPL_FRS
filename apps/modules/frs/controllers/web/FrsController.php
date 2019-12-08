<?php

namespace Kel5\FRS\Controllers\Web;

use Phalcon\Mvc\Controller;

class FrsController extends Controller
{
    public function indexAction()
    {

        return $this->view->pick('mahasiswa/home');
    }

    public function kelasAction()
    {
        return $this->view->pick('kelas');
    }

    public function ambilkelasAction()
    {
        return $this->view->pick('ambil');
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
}
