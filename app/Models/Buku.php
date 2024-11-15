<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    protected $fillable = ['judul','penulis','penerbit','tahun','jumlah'];
}
