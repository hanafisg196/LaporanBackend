<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model implements Authenticatable
{
    protected $table = "users";
   protected $primaryKey = "id";
   protected $keyType = "int";
   public $timestamps = true;
   public $incrementing = true;

   protected $fillable = [
    'username',
    'password',
    'nama',
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




//method bawaan Authenticatable
   public function getAuthIdentifierName()
   {
       return 'username';
   }

   public function getAuthIdentifier()
   {
       return $this->username;
   }

   public function getAuthPassword()
   {
       return $this->password;
   }

   public function getRememberToken()
   {
       return $this->token;
   }

   public function setRememberToken($value)
   {
       $this->token = $value;
   }

   public function getRememberTokenName()
   {
       return 'token';
   }













}
