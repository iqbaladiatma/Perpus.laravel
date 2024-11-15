<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member;

class Halamanmember extends Component
{
    public $pillihanMenu;
    public $nama;
    public $nisn;
    public $member_edit;

    public function tambahMember()
    {
        $this->pillihanMenu = 'tambahMember';
    }
    public function simpan()
    {
        // biar kalo simpan diedit ngga nambah baru.
        if ($this->member_edit) {
            $simpan = $this->member_edit;
        } else {
            $simpan = new Member();
        }

        $simpan->nama = $this->nama;
        $simpan->nisn = $this->nisn;
        $simpan->save();
        $this->reset();
    }

    public function hapusMember($id)
    {
        Member::destroy($id);
    }
    public function editMember($id)
    {
        $this->member_edit = Member::find($id);
        $this->nama = $this->member_edit->nama;
        $this->nisn = $this->member_edit->nisn;
        $this->pillihanMenu = 'editMember';
    }
    public function render()
    {
        return view('livewire.halamanmember')->with([
            'semuamember' => Member::all(),
        ]);
    }
}
