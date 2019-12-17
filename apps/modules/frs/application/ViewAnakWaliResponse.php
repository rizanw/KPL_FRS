<?php

namespace Kel5\FRS\Application;

class ViewAnakWaliResponse
{
    public $anakWalis;

    public function __construct()
    {
        $this->anakWalis = array();

    }

    public function addAnakWaliResponse($nrp, $nama, $ipk, $doswal, $alamat)
    {
        $anakWali = array(
            'nrp' => $nrp,
            'name' => $nama,
            'ipk' => $ipk,
            'doswal' => $doswal,
            'alamat' => $alamat
        );

        array_push($this->anakWalis, $anakWali);
    }
}