<?php

namespace Kel5\FRS\Application;

class ConfirmFRSRequest
{
    public $idFrs;

    public function __construct($idFrs)
    {
        $this->idFrs = $idFrs;
    }
}