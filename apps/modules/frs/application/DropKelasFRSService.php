<?php

namespace Kel5\FRS\Application;

use Kel5\FRS\Domain\Model\FRSRepository;

class DropKelasFRSService
{
    public $frsRepository;

    public function __construct(FRSRepository $frsRepository)
    {
        $this->frsRepository = $frsRepository;
    }

    public function execute(DropKelasFRSRequest $request)
    {
        $res = $this->frsRepository->dropKelas($request->idKelas);
        if($res){
            $isDrop = true;
            $kelas = $this->frsRepository->getKelasById($request->idKelas);
            $this->frsRepository->updateKelasKapasitas($kelas, $isDrop);
        }
    }
}