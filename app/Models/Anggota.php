<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Anggota extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "anggotas";
    protected $primaryKey = "id";
    protected $fillable = [
        'nim',
        'nama',
        'jabatan',
        'nomortelepon',
        'password',
        'nim_admin',
    ];
    use HasFactory;
    public function Calas()
    {
        return $this->hasMany(Calas::class, 'nim');
    }
    public function Asisten()
    {
        return $this->hasMany(Asisten::class, 'nim');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->nim_admin = auth::guard('admin')->user()->nim_admin;
        });
    }
}
