<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berobat extends Model
{
    use HasFactory;
    protected $fillable =[
        'id_pasien',
        'id_dokter',
        'keluhan',
        'diagnosa',
        'obat',
    ];

    public function dokter(){
        return $this->belongsTo(dokter::class);
    }

    public function pasien(){
        return $this->belongsTo(pasien::class);
    }
}
