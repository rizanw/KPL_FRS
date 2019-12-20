<?php


namespace Kel5\FRS\Application;


use Kel5\FRS\Domain\Model\FRSRepository;

class ViewPesertaKelasService
{
    private $frsRepository;

    /**
     * MenampilkanKelas constructor.
     * @param $frsRepository
     */
    public function __construct(FRSRepository $frsRepository)
    {
        $this->frsRepository = $frsRepository;
    }

    public function executeDept()
    {
        $kelas = $this->frsRepository->getPesertaKelas($idKelas);
        $response = new ViewKelasResponse();

        if($kelas) {
            foreach ($kelas as $row){
                $response->tambahKelas(
                    $row->getId(),
                    $row->getNamaMataKuliah(),
                    $row->getKodeMataKuliah(),
                    $row->getSks(),
                    $row->getGrup(),
                    $row->getKapasitas(),
                    $row->getDosen()->getNama()
                );
            }
        }

        return $response;
    }

    public function executeUpmb()
    {
        $kelas = $this->frsRepository->ambilKelasUpmb();
        $response = new ViewKelasResponse();

        if($kelas) {
            foreach ($kelas as $row){
                $response->tambahKelas(
                    $row->getId(),
                    $row->getNamaMataKuliah(),
                    $row->getKodeMataKuliah(),
                    $row->getSks(),
                    $row->getGrup(),
                    $row->getKapasitas(),
                    $row->getDosen()->getNama()
                );
            }
        }

        return $response;
    }


}