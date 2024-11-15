<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    //
    protected $fillable = ['buku_id', 'member_id', 'tanggal_pinjam', 'tanggal_kembali', 'status'];
    public function buku() {
        return $this->belongsTo(Buku::class);
    }
    public function member() {
        return $this->belongsTo(Member::class);
    }
}
