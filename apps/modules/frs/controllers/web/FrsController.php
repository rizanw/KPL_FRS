<?php

namespace Kel5\FRS\Controllers\Web;

use Kel5\FRS\Application\MenampilkanKelasService;
use Phalcon\Mvc\Controller;
class FrsController extends Controller
{
    public function indexAction()
    {
        return $this->view->pick('mahasiswa/home');
    }


    public function frsAction()
    {
        $frsRepository = $this->di->getShared('sql_frs_repository');
        $service = new MenampilkanKelasService($frsRepository);
        $responseKelasDept = $service->executeDept();
        $responseKelasUpmb = $service->executeDept();

        $this->view->setVar('dept', $responseKelasDept->kelas);
        $this->view->setVar('upmb', $responseKelasUpmb->kelas);
        //var_dump($responseKelasUpmb->kelas);
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
