<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusteriModel extends Model
{
    use HasFactory;
    protected $table = "Musteri";
    protected $fillable=["id","tc","firma_id","ad","soyad","date","mail","telefon"];

    public function firma()
    {
      return $this->belongsTo(FirmaModel::class);
    }
}
