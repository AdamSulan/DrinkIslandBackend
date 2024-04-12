<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recept extends Model
{
    protected $table = 'receptek';
    protected $fillable = ['italok_id', 'alapanyag_id', 'amount'];
    public $timestamps = false;

    public function ital()
    {
        return $this->belongsTo(Ital::class, 'italok_id');
    }

    public function alapanyag()
    {
        return $this->belongsTo(Alapanyag::class, 'alapanyag_id');
    }
}
