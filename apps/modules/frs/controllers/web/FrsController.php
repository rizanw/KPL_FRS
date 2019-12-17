<?php

namespace Kel5\FRS\Controllers\Web;

use Kel5\FRS\Application\AddKelasRequest;
use Kel5\FRS\Application\AddKelasService;
use Kel5\FRS\Application\ConfirmFRSRequest;
use Kel5\FRS\Application\ConfirmFRSService;
use Kel5\FRS\Application\DropKelasFRSRequest;
use Kel5\FRS\Application\DropKelasFRSService;
use Kel5\FRS\Application\ViewAnakWaliService;

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
        if ($this->isDosen) {
            $this->nip = "198410162008121002";
        } else {
            $this->nrp = "05111740000183";
        }
    }

    public function indexAction()
    {
        if ($this->isDosen) {
            return $this->view->pick('dosen/home');
        } else {
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

        if ($this->request->isPost()) {
            $idKelas = $this->request->getPost('id_kelas');
            $idFrs = $this->request->getPost('id_frs');
            $nrp = $this->request->getPost('nrp');
            $setujuiFrs = $this->request->getPost('setuju');
            $dropKelas = $this->request->getPost('dodrop');

            if ($dropKelas) {
                $request = new DropKelasFRSRequest($idKelas);
                $service = new  DropKelasFRSService($this->frsRepository);
                $service->execute($request);
            } elseif ($idKelas) {
                $request = new AddKelasRequest(
                    $idFrs,
                    $idKelas,
                    $nrp
                );
                $service = new AddKelasService($this->frsRepository);
                $service->execute($request);
            } elseif ($setujuiFrs) {
                $request = new ConfirmFRSRequest(
                    $idFrs
                );
                $service = new ConfirmFRSService($this->frsRepository);
                $service->execute($request);
            }
        }

        if ($this->isDosen) {
            if (!$anakWaliNrp)
                return "Mahasiswa tidak ditemukan";

            $viewFrsService = new ViewFrsService($this->frsRepository);
            $viewFrsResponse = $viewFrsService->execute($anakWaliNrp);

            $batasSks = 0;
            if ((float)$viewFrsResponse->mahasiswa['ipk'] < 2.0) {
                $batasSks = 16;
            } elseif ((float)$viewFrsResponse->mahasiswa['ipk'] > 3.0) {
                $batasSks = 24;
            } else {
                $batasSks = 20;
            }

            $totalSks = 0;
            foreach ($viewFrsResponse->kelasTerpilih as $item) {
                $totalSks = $totalSks + $item['sks'];
            }
            $this->view->setVar('totalsks', $totalSks);
            $this->view->setVar('batassks', $batasSks);
            $this->view->setVar('frs', $viewFrsResponse->frs);
            $this->view->setVar('mahasiswa', $viewFrsResponse->mahasiswa);
            $this->view->setVar('kelas_terpilih', $viewFrsResponse->kelasTerpilih);
            return $this->view->pick('dosen/frs');
        } else {
            $viewFrsService = new ViewFrsService($this->frsRepository);
            $viewFrsResponse = $viewFrsService->execute($this->nrp);

            $totalSks = 0;
            foreach ($viewFrsResponse->kelasTerpilih as $item) {
                $totalSks = $totalSks + $item['sks'];
            }

            $batasSks = 0;
            if ((float)$viewFrsResponse->mahasiswa['ipk'] < 2.0) {
                $batasSks = 16;
            } elseif ((float)$viewFrsResponse->mahasiswa['ipk'] > 3.0) {
                $batasSks = 24;
            } else {
                $batasSks = 20;
            }

            $this->view->setVar('totalsks', $totalSks);
            $this->view->setVar('batassks', $batasSks);
            $this->view->setVar('frs', $viewFrsResponse->frs);
            $this->view->setVar('mahasiswa', $viewFrsResponse->mahasiswa);
            $this->view->setVar('kelas_terpilih', $viewFrsResponse->kelasTerpilih);
            return $this->view->pick('mahasiswa/frs');
        }
    }

    public function cetakAction()
    {
        $viewFrsService = new ViewFrsService($this->frsRepository);
        $viewFrsResponse = $viewFrsService->execute($this->nrp);
        $this->view->setVar('frs', $viewFrsResponse->frs);
        $this->view->setVar('mahasiswa', $viewFrsResponse->mahasiswa);
        $this->view->setVar('kelas_terpilih', $viewFrsResponse->kelasTerpilih);

        $totalSks = 0;
        foreach ($viewFrsResponse->kelasTerpilih as $item) {
            $totalSks = $totalSks + $item['sks'];
        }
        $this->view->setVar('totalsks', $totalSks);
        return $this->view->pick('mahasiswa/cetak');
    }

    public function anakWaliAction()
    {
        if ($this->isDosen) {
            $viewAnakWaliService = new ViewAnakWaliService($this->frsRepository);
            $response = $viewAnakWaliService->execute($this->nip);

            $this->view->setVar('anakWalis', $response->anakWalis);
            return $this->view->pick('dosen/daftar_anak_wali');
        }
        return "403";
    }

    public function kelasAction()
    {
        return $this->view->pick('dosen/kelas');
    }
}
