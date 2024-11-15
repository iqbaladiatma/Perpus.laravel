<?php

namespace App\Livewire;

use App\Models\Buku;
use App\Models\Member;
use App\Models\Pinjam;
use Livewire\Component;

class Halamanpinjam extends Component
{
    public $pillihanMenu;
    public $buku_id;
    public $member_id;
    public $tanggal_pinjam;
    public $tanggal_kembali;
    public $pinjam_edit;
    public $cari;
    public $member_nama;
    public $semuabuku;

    public function tambahPinjam()
    {
        $this->pillihanMenu = 'tambahPinjam';
    }

    public function cariSiswa()
    {
        $hasilcari = Member::where('nisn', $this->cari)->first();
        if ($hasilcari) {
            $this->member_id = $hasilcari->id;
            $this->member_nama = $hasilcari->id;
            $this->semuabuku = Buku::all();
        } else {
            $this->member_id = '';
        }
    }

    public function simpan()
    {
        $this->validate([
            'buku_id' => 'required|exists:bukus,id', // Ensure buku_id is provided and exists in the Buku table
            'member_id' => 'required|exists:members,id', // Ensure member_id is provided and exists in the Member table
        ]);
        // biar kalo simpan diedit ngga nambah baru.
        if ($this->pinjam_edit) {
            $simpan = $this->pinjam_edit;
        } else {
            $simpan = new Pinjam();
        }

        $simpan->buku_id = $this->buku_id;
        $simpan->member_id = $this->member_id;
        $simpan->tanggal_kembali = now();
        $simpan->tanggal_pinjam = now()->addDays(7);
        $simpan->save();
        $this->reset();
    }

    public function hapusPinjam($id)
    {
        Pinjam::destroy($id);
    }
    public function editPinjam($id)
    {
        $this->pinjam_edit = Pinjam::find($id);
        $this->buku_id = $this->pinjam_edit->buku_id;
        $this->member_id = $this->pinjam_edit->member_id;
        $this->tanggal_pinjam = $this->pinjam_edit->tanggal_pinjam;
        $this->tanggal_kembali = $this->pinjam_edit->tanggal_kembali;
        $this->semuabuku = Buku::all();
        $this->pillihanMenu = 'editPinjam';
    }

    public function render()
    {
        return view('livewire.halamanpinjam')->with(
            [
                'semuapinjam' => Pinjam::all(),
            ]
        );
    }
}
