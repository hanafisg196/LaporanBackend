<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $table = "users";
   protected $primaryKey = "id";
   protected $keyType = "int";
   public $timestamps = true;
   public $incrementing = true;

   protected $fillable = [
    'username',
    'password',
    'name',
    'email',
    'posisi',
    'jabatan',
    'kecamatan',
    'kabupaten_kota',
    'provinsi',
    'role',
   ];


   public function kegiatan(): HasMany
   {
    return $this->hasMany(Kegiatan::class, "user_id", "id");
   }
}
