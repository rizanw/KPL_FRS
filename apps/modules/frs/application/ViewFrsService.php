<?php

namespace Kel5\FRS\Application;

use Kel5\FRS\Domain\Model\Mahasiswa;
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
        $frs = $this->frsRepository->getFrsByNrp($mahasiswaNrp, "0", "2019");
        $mahasiswa = $this->frsRepository->getMahasiswaByNrp($mahasiswaNrp);

        $response = new ViewFrsResponse();

        if ($frs) {
            $response->addFrsResponse(
                $frs->getId(),
                $frs->getNrp(),
                $frs->getPeriode(),
                $frs->getTahun(),
                $frs->getIsDisetujui()
            );
        }

        if ($mahasiswa) {
            $response->addMahasiswaFrsResponse(
                $mahasiswa->getNrp(),
                $mahasiswa->getNama(),
                $mahasiswa->getIpk(),
                $mahasiswa->getDoswal(),
                $mahasiswa->getAlamat()
            );
        }
        return $response;
    }
}