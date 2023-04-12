<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;

    protected $fillable =[
        'nama_pasien',
        'jk',
        'umur',
    ];

    public function berobat(){
        return $this->hasMany(berobat::class);
    }
}
