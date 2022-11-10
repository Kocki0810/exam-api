<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ordre extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "ordre";

    protected $fillable = [
        'firma_id',
        'ekspedient_id',
        'pris',
        'date',
    ];

    public function firma() 
    {
        return $this->hasOne(firma::class);
    }
    public function linje() 
    {
        return $this->hasMany(linje::class);
    }
    public function ekspedient() 
    {
        return $this->hasMany(ekspedient::class);
    }
}
