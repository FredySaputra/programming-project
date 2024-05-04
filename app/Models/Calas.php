<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calas extends Model
{

    public function index()
    {
        return view('dashboard.Calas.presensi-calas');
    }
    use HasFactory;
    protected $table = "calas";
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
}
