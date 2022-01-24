<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmaModel extends Model
{
    use HasFactory;
    protected $table = "firma";
    protected $fillable=["id","firma","mernis_kontrol"];

    public function musteriler()
    {
      return $this->hasMany(MusteriModel::class);
    }
}
