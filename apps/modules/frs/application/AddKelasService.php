<?php

namespace Kel5\FRS\Application;

use Kel5\FRS\Domain\Model\FRSRepository;

class AddKelasService
{
    public $frsRepository;

    public function __construct(FRSRepository $frsRepository)
    {
        $this->frsRepository = $frsRepository;
    }

    public function execute(AddKelasRequest $request)
    {
        $frs = $this->frsRepository->getFrsById($request->idFrs);
        $kelas = $this->frsRepository->getKelasById($request->idKelas);

        $res = $this->frsRepository->addKelasTerpilih($frs, $kelas);
        if($res){
            $isDrop = false;
            $this->frsRepository->updateKelasKapasitas($kelas, $isDrop);
        }
    }
}