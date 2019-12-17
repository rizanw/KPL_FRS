<?php

namespace Kel5\FRS\Controllers\Web;


use Kel5\FRS\Application\AddKelasRequest;
use Kel5\FRS\Application\AddKelasService;
use Kel5\FRS\Application\MenampilkanKelasDosenService;
use Kel5\FRS\Application\ViewAnakWaliService;
use Kel5\FRS\Application\MenampilkanKelasService;
use Phalcon\Mvc\Controller;
use Kel5\FRS\Application\ViewFrsService;

class FrsController extends Controller
{
    private $nrp =  "05111740000183";
    private $nip = "198410162008121002";
    private $isDosen;
    private $frsRepository;
    public function onConstruct()
    {
        $this->frsRepository = $this->di->getShared('sql_frs_repository');


    }

    public function indexAction()
    {
        return $this->view->pick('login');
    }

    public function loginAction()
    {
        if ($_POST['usid'] == 'dosen') {
            $this->nip = "198410162008121002";
            $this->isDosen = true;
            return $this->view->pick('dosen/home');
        } else {
            $this->nrp = "05111740000183";
            $this->isDosen = false;
            return $this->view->pick('mahasiswa/home');
        }

    }



    public function frsAction($anakWaliNrp = null)
    {
        $service = new MenampilkanKelasService($this->frsRepository);
        $responseKelasDept = $service->executeDept();
        $responseKelasUpmb = $service->executeUpmb();
        $this->view->setVar('dept', $responseKelasDept->kelas);
        $this->view->setVar('upmb', $responseKelasUpmb->kelas);

        if($this->request->isPost()) {
            $idKelas = $this->request->getPost('id_kelas');
            $idFrs = $this->request->getPost('id_frs');
            $nrp = $this->request->getPost('nrp');

            $request = new AddKelasRequest(
                $idFrs,
                $idKelas,
                $nrp
            );

            $service = new AddKelasService($this->frsRepository);
            $res = $service->execute($request);

//            if($res){
//                $this->flashSession->success("<h4 class=\"alert-heading\">Berhasil Diambil!</h4>");
//            }else{
//                $this->flashSession->error("<h4 class=\"alert-heading\">Gagal Diambil!</h4> <a> kelas penuh</a>.");
//            }

        }

        if($this->isDosen){
            if(!$anakWaliNrp)
                return "Mahasiswa tidak ditemukan";

            $viewFrsService = new ViewFrsService($this->frsRepository);
            $viewFrsResponse =  $viewFrsService->execute($anakWaliNrp);

            $this->view->setVar('frs', $viewFrsResponse->frs);
            $this->view->setVar('mahasiswa', $viewFrsResponse->mahasiswa);
            return $this->view->pick('dosen/frs');
        }else {
            $viewFrsService = new ViewFrsService($this->frsRepository);
            $viewFrsResponse =  $viewFrsService->execute($this->nrp);

            $this->view->setVar('frs', $viewFrsResponse->frs);
            $this->view->setVar('mahasiswa', $viewFrsResponse->mahasiswa);
            return $this->view->pick('mahasiswa/frs');
        }
    }

    public function dropkelasAction()
    {
        # code...
        return $this->view->pick('mahasiswa/home');
    }

    public function cetakAction()
    {
        $viewFrsService = new ViewFrsService($this->frsRepository);
        $viewFrsResponse =  $viewFrsService->execute($this->nrp);
        $this->view->setVar('frs', $viewFrsResponse->frs);
        $this->view->setVar('mahasiswa', $viewFrsResponse->mahasiswa);
        return $this->view->pick('mahasiswa/cetak');
    }

    public function anakWaliAction()
    {
        $viewAnakWaliService = new ViewAnakWaliService($this->frsRepository);
        $response = $viewAnakWaliService->execute($this->nip);
        $this->view->setVar('anakWalis', $response->anakWalis);
        return $this->view->pick('dosen/daftar_anak_wali');
    }

    public function listKelasAction()
    {
        $service = new MenampilkanKelasDosenService($this->frsRepository);
        $response = $service->execute($this->nip);
        $this->view->setVar('kelas', $response->kelas);
        return $this->view->pick('dosen/kelas');
    }

    public function PesertaKelasAction(){
        $service = new MenampilkanKelasDosenService($this->frsRepository);
        return $this->view->pick('dosen/peserta');
    }
}
