<?php

namespace Kel5\FRS\Controllers\Web;


use Kel5\FRS\Application\AddKelasRequest;
use Kel5\FRS\Application\AddKelasService;
use Kel5\FRS\Application\MenampilkanKelasDosenService;

use Kel5\FRS\Application\ConfirmFRSRequest;
use Kel5\FRS\Application\ConfirmFRSService;
use Kel5\FRS\Application\DropKelasFRSRequest;
use Kel5\FRS\Application\DropKelasFRSService;
use Kel5\FRS\Application\ViewAnakWaliService;
use Kel5\FRS\Application\ViewKelasResponse;
use Kel5\FRS\Application\ViewKelasService;
use Kel5\FRS\Application\ViewFrsService;
use Kel5\FRS\Application\ViewPesertaKelasService;
use Phalcon\Mvc\Controller;

/**
 * Class Controller untuk moodul FRS
 * @package Kel5\FRS\Controllers\Web
 */
class FrsController extends Controller
{
    private $nrp;
    private $nip;
    private $isDosen;
    private $frsRepository;
    public function onConstruct()
    {
        $this->frsRepository = $this->di->getShared('sql_frs_repository');
        $this->isDosen = true;
        if ($this->isDosen) {
            $this->nip = "198410162008121002";
        } else {
            $this->nrp = "05111740000183";
        }
    }

    /**
     * Halaman index
     * @return \Phalcon\Mvc\View
     */
    public function indexAction()
    {
        if ($this->isDosen) {
            return $this->view->pick('dosen/home');
        } else {
            return $this->view->pick('mahasiswa/home');
        }
    }

    /**
     * Halaman FRS
     * @param null $anakWaliNrp untuk dosen only
     * @return \Phalcon\Mvc\View|string
     */
    public function frsAction($anakWaliNrp = null)
    {
        /*
         * Service untuk mengambil data kelas
         */
        $service = new ViewKelasService($this->frsRepository);
        $responseKelasDept = $service->executeDept();
        $responseKelasUpmb = $service->executeUpmb();
        $this->view->setVar('dept', $responseKelasDept->kelas);
        $this->view->setVar('upmb', $responseKelasUpmb->kelas);

        /*
         * periksa http post request yang masuk di halaman FRS
         */
        if ($this->request->isPost()) {
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


            $setujuiFrs = $this->request->getPost('setuju');
            $dropKelas = $this->request->getPost('dodrop');

            if ($dropKelas) {
                /*
                 * service drop kelas ketika mendapat post request drop kelas
                 */
                $request = new DropKelasFRSRequest($idKelas);
                $service = new  DropKelasFRSService($this->frsRepository);
                $service->execute($request);
            } elseif ($idKelas) {
                /*
                 * service add kelas ketika mendapat post request tambah kelas
                 */
                $request = new AddKelasRequest(
                    $idFrs,
                    $idKelas,
                    $nrp
                );

                $service = new AddKelasService($this->frsRepository);
                $service->execute($request);
            } elseif ($setujuiFrs) {
                /*
                 * service menyetujui frs dan membatalkan persetujuan frs
                 */
                $request = new ConfirmFRSRequest(
                    $idFrs
                );
                $service = new ConfirmFRSService($this->frsRepository);
                $service->execute($request);
            }

        }

        /*
         * tampilan halaman frs untuk dosen
         */
        if ($this->isDosen) {
            if (!$anakWaliNrp)
                return "Mahasiswa tidak ditemukan";

            $viewFrsService = new ViewFrsService($this->frsRepository);
            $viewFrsResponse = $viewFrsService->execute($anakWaliNrp);

            $this->view->setVar('frs', $viewFrsResponse->frs);
            $this->view->setVar('mahasiswa', $viewFrsResponse->mahasiswa);
            $this->view->setVar('kelas_terpilih', $viewFrsResponse->kelasTerpilih);
            return $this->view->pick('dosen/frs');
        }

        /*
         * tampilan halaman frs untuk mahasiswa
         */
        if (!$this->isDosen) {
            $viewFrsService = new ViewFrsService($this->frsRepository);
            $viewFrsResponse = $viewFrsService->execute($this->nrp);

            $this->view->setVar('frs', $viewFrsResponse->frs);
            $this->view->setVar('mahasiswa', $viewFrsResponse->mahasiswa);
            $this->view->setVar('kelas_terpilih', $viewFrsResponse->kelasTerpilih);
            return $this->view->pick('mahasiswa/frs');
        }

    }

    /**
     * Halaman cetak frs mahasiswa
     * @return \Phalcon\Mvc\View
     */
    public function cetakAction()
    {
        $viewFrsService = new ViewFrsService($this->frsRepository);
        $viewFrsResponse = $viewFrsService->execute($this->nrp);

        $this->view->setVar('frs', $viewFrsResponse->frs);
        $this->view->setVar('mahasiswa', $viewFrsResponse->mahasiswa);
        $this->view->setVar('kelas_terpilih', $viewFrsResponse->kelasTerpilih);
        return $this->view->pick('mahasiswa/cetak');
    }

    /**
     * Halaman daftar anak wali
     *
     * @return \Phalcon\Mvc\View|string
     */
    public function anakWaliAction()
    {

        $viewAnakWaliService = new ViewAnakWaliService($this->frsRepository);
        $response = $viewAnakWaliService->execute($this->nip);
        $this->view->setVar('anakWalis', $response->anakWalis);
        return $this->view->pick('dosen/daftar_anak_wali');

    }
  
    /**
     * @return \Phalcon\Mvc\View
     */
    public function kelasAction($idKelas = null)
    {
        if($idKelas){
            $viewPesertaKelasService = new ViewPesertaKelasService($this->frsRepository);
            $response = $viewPesertaKelasService->execute($idKelas);

            $this->view->setVar('peserta_kelas', $response->peserta);
            $this->view->setVar('kelas', $response->kelas);
            return $this->view->pick('dosen/kelas_peserta');
        }

        $service = new ViewKelasService($this->frsRepository);
        $responseKelasDept = $service->executeDept();
        $responseKelasUpmb = $service->executeUpmb();
        $this->view->setVar('dept', $responseKelasDept->kelas);
        $this->view->setVar('upmb', $responseKelasUpmb->kelas);

        return $this->view->pick('dosen/kelas');
    }
  
}
