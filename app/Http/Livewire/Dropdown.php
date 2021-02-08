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
    public $selectedState5 = NULL;

    public function mount($selectedState5 = NULL)
    {
        $this->provinsi = provinsi::all();
        $this->kota = collect();
        $this->kecamatan = collect();
        $this->kelurahan = collect();
        $this->rw = collect();
        $this->selectedState5 = $selectedState5;

        if (!is_null($selectedState5)) {
            $rw = rw::with('kelurahan.kecamatan.kota.provinsi')->find($selectedState5); // mencari data rw di DB
            if ($rw) {
                $this->rw = rw::where('id_kelurahan', $rw->id_kelurahan)->get(); //mengambil data kelurahan melalui id_rw
                $this->kelurahan = kelurahan::where('id_kecamatan', $rw->kelurahan->id_kecamatan)->get(); //mengambil 
                $this->kecamatan = kecamatan::where('id_kota', $rw->kelurahan->kecamatan->id_kota)->get();
                $this->kota = kota::where('id_provinsi', $rw->kelurahan->kecamatan->kota->id_provinsi)->get();
                $this->selectedState  = $rw->kelurahan->kecamatan->kota->id_provinsi;
                $this->selectedState2 = $rw->kelurahan->kecamatan->id_kota;
                $this->selectedState3 = $rw->kelurahan->id_kecamatan;
                $this->selectedState4 = $rw->id_kelurahan;
            }
        }
    }

    public function render()
    {
        return view('livewire.dropdown');
    }

    public function updatedSelectedState($provinsi)
    {
        $this->kota = kota::where('id_provinsi', $provinsi)->get();
        $this->selectedState2 = NULL;
        $this->selectedState3 = NULL;
        $this->selectedState4 = NULL;
        $this->selectedState5 = NULL;
    }

    public function updatedSelectedState2($kota)
    {
        $this->kecamatan = kecamatan::where('id_kota', $kota)->get();
        $this->selectedState3 = NULL;
        $this->selectedState4 = NULL;
        $this->selectedState5 = NULL;
    }

    public function updatedSelectedState3($kecamatan)
    {
        $this->kelurahan = kelurahan::where('id_kecamatan', $kecamatan)->get();
        $this->selectedState4 = NULL;
        $this->selectedState5 = NULL;
    }

    public function updatedSelectedState4($kelurahan)
    {
        if (!is_null($kelurahan)) {
            $this->rw = rw::where('id_kelurahan', $kelurahan)->get();
        } else {
            $this->selectedState5 = NULL;
        }
    }
}
