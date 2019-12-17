<?php

namespace Kel5\FRS\Domain\Model;

class FRS
{
    private $id;
    private $nrp;
    private $periode;
    private $tahun;
    private $isDisetujui;

    public function __construct($id, $nrp, $periode, $tahun, $isDisetujui)
    {
        $this->id = $id;
        $this->nrp = $nrp;
        $this->periode = $periode;
        $this->tahun = $tahun;
        $this->isDisetujui = $isDisetujui;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNrp()
    {
        return $this->nrp;
    }

    /**
     * @return mixed
     */
    public function getTahun()
    {
        return $this->tahun;
    }

    /**
     * @return mixed
     */
    public function getIsDisetujui()
    {
        return $this->isDisetujui;
    }

    /**
     * @return mixed
     */
    public function getPeriode()
    {
        return $this->periode;
    }


}