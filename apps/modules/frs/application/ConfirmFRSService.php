<?php

namespace Kel5\FRS\Application;

use Kel5\FRS\Domain\Model\FRSRepository;

class ConfirmFRSService
{
    public $frsRepository;

    public function __construct(FRSRepository $frsRepository)
    {
        $this->frsRepository = $frsRepository;
    }

    public function execute(ConfirmFRSRequest $request)
    {
        $this->frsRepository->confirmFrs($request->idFrs);
    }
}