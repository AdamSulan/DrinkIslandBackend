<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipus extends Model
{
    protected $table = 'tipus';
    protected $fillable = [
        'italok_id',
        'teli',
        'nyari',
        'edes',
        'savanyu',
        'keseru',
        'alkoholos',
        'alkoholmentes'];
    public $timestamps = false;

    public function ital()
    {
        return $this->belongsTo(Ital::class, 'italok_id');
    }
}
