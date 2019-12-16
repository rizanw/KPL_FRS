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
//        $frs = $this->frsRepository->all();
        $mahasiswa = $this->frsRepository->getMahasiswaByNrp(new MahasiswaNrp($mahasiswaNrp));

        $response = new ViewFrsResponse();

//        if($frs) {
//            foreach ($frs as $r) {
//                $response->addFrsResponse(
//
//                );
//            }
//        }


        $response->addMahasiswaFrsResponse(
            $mahasiswa->getNrp()->getNrp(),
            $mahasiswa->getNama(),
            $mahasiswa->getIpk(),
            $mahasiswa->getDoswal()->getNama()
        );

        return $response;
    }
}