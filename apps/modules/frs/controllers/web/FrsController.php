<?php

namespace Kel5\FRS\Controllers\Web;

use Kel5\FRS\Application\ViewAnakWaliService;
use Kel5\FRS\Domain\Model\MahasiswaNrp;
use Kel5\FRS\Application\MenampilkanKelasService;
use Phalcon\Mvc\Controller;
use Kel5\FRS\Application\ViewFrsService;

class FrsController extends Controller
{
    private $nrp;
    private $nip;
    private $isDosen;
    private $frsRepository;

    public function onConstruct()
    {
        $this->frsRepository = $this->di->getShared('sql_frs_repository');

        $this->isDosen = False;
        if ($this->isDosen){
            $this->nip = "198410162008121002";
        }else{
            $this->nrp = "05111740000183";
        }
    }

    public function indexAction()
    {
        if($this->isDosen){
            return $this->view->pick('dosen/home');
        }else {
            return $this->view->pick('mahasiswa/home');
        }
    }


    public function frsAction()
    {
        if($this->isDosen){
            return $this->view->pick('dosen/frs');
        }else {
            $service = new MenampilkanKelasService($this->frsRepository);
            $responseKelasDept = $service->executeDept();
            $responseKelasUpmb = $service->executeUpmb();

            $viewFrsService = new ViewFrsService($this->frsRepository);
            $viewFrsResponse =  $viewFrsService->execute($this->nrp);

            $this->view->setVar('dept', $responseKelasDept->kelas);
            $this->view->setVar('upmb', $responseKelasUpmb->kelas);
            $this->view->setVar('mahasiswa', $viewFrsResponse->mahasiswa);
            return $this->view->pick('mahasiswa/frs');
        }
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
        if ($this->isDosen){
            $viewAnakWaliService = new ViewAnakWaliService($this->frsRepository);
            $response = $viewAnakWaliService->execute($this->nip);

            $this->view->setVar('anakWalis', $response->anakWalis);
            return $this->view->pick('dosen/daftar_anak_wali');
        }
        return "403";
    }

    public function kelasAction(){
        return $this->view->pick('dosen/kelas');
    }
}
