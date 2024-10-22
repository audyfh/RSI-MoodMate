<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psikolog extends Model
{
    use HasFactory;

    protected $table = 'psikologs';
    protected $fillable = [
        'nama',
        'tempat_kerja',
        'alamat',
        'nomor_telepon',
        'email',
        'foto'
    ];
}
