<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kegiatan extends Model
{
    protected $table = "kegiatans";
   protected $primaryKey = "id";
   protected $keyType = "int";
   public $timestamps = true;
   public $incrementing = true;

   protected $fillable = [
    'nagari_kunjungan',
    'kegiatan',
    'hasil',
    'langkah',
    'user_id',
    'rekomendasi'
   ];

   public function user(): BelongsTo
    {
    return $this->belongsTo(User::class, "user_id", "id");
    }
}
