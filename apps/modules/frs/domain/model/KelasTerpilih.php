<?php

namespace Kel5\FRS\Domain\Model;

class KelasTerpilih
{
    private $id_terpilih;
    private $id_frs;
    private $id_kelas;

    /**
     * KelasTerpilih constructor.
     * @param $id_terpilih
     * @param $id_frs
     * @param $id_kelas
     */
    public function __construct($id_terpilih, $id_frs, $id_kelas)
    {
        $this->id_terpilih = $id_terpilih;
        $this->id_frs = $id_frs;
        $this->id_kelas = $id_kelas;
    }

    /**
     * @return mixed
     */
    public function getIdTerpilih()
    {
        return $this->id_terpilih;
    }

    /**
     * @return mixed
     */
    public function getIdFrs()
    {
        return $this->id_frs;
    }

    /**
     * @return mixed
     */
    public function getIdKelas()
    {
        return $this->id_kelas;
    }


}