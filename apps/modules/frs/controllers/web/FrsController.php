<?php

namespace Kel5\FRS\Controllers\Web;

use Kel5\FRS\Application\ViewAnakWaliService;
use Kel5\FRS\Domain\Model\MahasiswaNrp;
use Kel5\FRS\Application\MenampilkanKelasService;
use Phalcon\Mvc\Controller;
use Kel5\FRS\Application\ViewFrsService;

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
        $responseKelasUpmb = $service->executeUpmb();

        $this->view->setVar('dept', $responseKelasDept->kelas);
        $this->view->setVar('upmb', $responseKelasUpmb->kelas);
        //var_dump($responseKelasUpmb->kelas);
        $frsRepository = $this->di->getShared('sql_frs_repository');
        $nrp = "05111640000001";
        $viewFrsService = new ViewFrsService($frsRepository);

        $viewFrsResponse =  $viewFrsService->execute($nrp);

        $this->view->setVar('mahasiswa', $viewFrsResponse->mahasiswa);

        return $this->view->pick('mahasiswa/frs');
    }

    public function menyusunFRS()
    {
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

    public function anakWaliAction()
    {
        $frsRepository = $this->di->getShared('sql_frs_repository');
        $nip = "198410162008121002";
        $viewAnakWaliService = new ViewAnakWaliService($frsRepository);
        $response = $viewAnakWaliService->execute($nip);

        $this->view->setVar('anakWalis', $response->anakWalis);
        return $this->view->pick('dosen/daftar_anak_wali');
    }
}
