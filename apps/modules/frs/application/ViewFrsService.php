<?php

namespace Kel5\FRS\Application;

use Kel5\FRS\Domain\Model\FRSRepository;
use Kel5\FRS\Domain\Model\MahasiswaNrp;

class ViewFrsService
{
    private $frsRepository;

    public function __construct(FRSRepository $frsRepository)
    {
        $this->frsRepository = $frsRepository;
    }

    public function execute($mahasiswaNrp)
    {
        $frs = $this->frsRepository->getFrsByNrp(new MahasiswaNrp($mahasiswaNrp), "0", "2019");

        $response = new ViewFrsResponse();

        if ($frs) {
            $mahasiswa = $frs->getMahasiswa();
            $response->addMahasiswaFrsResponse(
                $mahasiswa->getNrp()->getNrp(),
                $mahasiswa->getNama(),
                $mahasiswa->getIpk(),
                $mahasiswa->getDoswal(),
                $mahasiswa->getAlamat()
            );

            $kelasTerpilih = $this->frsRepository->getKelasTerpilih($frs);
            if ($kelasTerpilih) {
                foreach ($kelasTerpilih as $row) {
                    $response->addKelas(
                        $row->getId(),
                        $row->getNamaMataKuliah(),
                        $row->getKodeMataKuliah(),
                        $row->getSks(),
                        $row->getGrup(),
                        $row->getPeriode(),
                        $row->getTahun(),
                        $row->getDosen()->getNama()
                    );
                }
            }

            $response->addFrsResponse(
                $frs->getId(),
                $frs->getPeriode(),
                $frs->getTahun(),
                $frs->getIsDisetujui(),
                $frs->getTotalSks(),
                $frs->getBatasSks(),
                $frs->getSisaSks()
            );
        }

        return $response;
    }
}