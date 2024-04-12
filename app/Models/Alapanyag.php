<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alapanyag extends Model
{
    protected $table = 'alapanyagok';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function receptek()
    {
        return $this->hasMany(Recept::class, 'alapanyag_id');
    }
}