<?php

namespace App\Models;

class Prodi 
{
    public $kode;
    public $nama;
    public $kaprodi;

    public function __construct($kode, $nama, $kaprodi)
    {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->kaprodi = $kaprodi;
    }
}
