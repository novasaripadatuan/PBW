<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    //membaca data
    protected $table='mahasiswa';

    //manipulasi data
    protected $fillable= [
        'nim',
        'nama',
        'gender',
        'prodi',
        'minat'
    ];
}
