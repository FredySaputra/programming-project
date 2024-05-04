<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asisten extends Model
{
    use HasFactory;
    protected $table = "asisten";
    protected $primaryKey = "nim";
    protected $fillable = [
        'id',
        'nim',
        'nama',
        'jabatan',
        'tgl',
        'jammasuk',
        'jamkeluar'
    ];
    public function user()
    {
        return $this->belongsTo(Anggota::class, 'nim');
    }

    public function nama()
    {
        return $this->belongsTo(Anggota::class, 'nama');
    }
}
