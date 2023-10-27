<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_barang',
        'name',
        'keterangan'
    ];

    public function detailbarangs()
    {
        return $this->hasMany(DetailBarang::class);
    }

    public function requests()
    {
        return $this->hasMany(RequestBarang::class);
    }
}
