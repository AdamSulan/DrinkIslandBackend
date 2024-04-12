<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ital extends Model
{
    protected $table = 'italok';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function receptek()
    {
        return $this->hasMany(Recept::class, 'italok_id');
    }

    public function tipus()
    {
        return $this->hasOne(Tipus::class, 'italok_id');
    }
}