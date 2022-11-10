<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produktgruppe extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "produktgrupper";

    protected $fillable = [
        'firma_id',
        'navn',
    ];
    
    public function produkt() 
    {
        return $this->hasMany(produkt::class);
    }
    public function firma() 
    {
        return $this->hasOne(firma::class);
    }
}
