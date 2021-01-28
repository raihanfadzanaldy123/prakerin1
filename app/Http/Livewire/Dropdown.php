<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\provinsi;
use App\Models\kota;
use App\Models\kecamatan;
use App\Models\kelurahan;
use App\Models\rw;

class Dropdown extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $kelurahan;
    public $rw;

    public $selectedState  = NULL;
    public $selectedState2 = NULL;
    public $selectedState3 = NULL;
    public $selectedState4 = NULL;

    public function mount()
    {
        $this->provinsi = provinsi::all();
        $this->kota      = collect();
        $this->kecamatan = collect();
        $this->kelurahan = collect();
        $this->rw        = collect();
    }

    public function render()
    {
        return view('livewire.dropdown');
    }

    public function updatedSelectedState($provinsi)
    {
        if (!is_null($provinsi)) {
            $this->kota = kota::where('id_provinsi', $provinsi)->get();
        }
    }

    public function updatedSelectedState2($kota)
    {
        if (!is_null($kota)) {
            $this->kecamatan = kecamatan::where('id_kota', $kota)->get();
        }
    }

    public function updatedSelectedState3($kecamatan)
    {
        if (!is_null($kecamatan)) {
            $this->kelurahan = kelurahan::where('id_kecamatan', $kecamatan)->get();
        }
    }

    public function updatedSelectedState4($kelurahan)
    {
        if (!is_null($kelurahan)) {
            $this->rw = rw::where('id_kelurahan', $kelurahan)->get();
        }
    }
}
