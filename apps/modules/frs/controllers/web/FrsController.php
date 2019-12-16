<?php

namespace Kel5\FRS\Controllers\Web;

use Phalcon\Mvc\Controller;

class FrsController extends Controller
{
    public function indexAction()
    {
        return $this->view->pick('mahasiswa/home');
    }
<<<<<<< HEAD
}
=======

    public function frsAction()
    {
        return $this->view->pick('mahasiswa/frs');
    }

    public function ambilkelasAction()
    {
        return $this->view->pick('mahasiswa/ambil');
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
>>>>>>> cd1e563dcdead368012fdc98209e1fed0f77fe79
