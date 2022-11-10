<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produkt extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "produkter";
    
    protected $fillable = [
        'produktgruppe_id',
        'firma_id',
        'navn',
        'pris',
    ];

    public function produktgruppe() 
    {
        return $this->hasOne(produktgruppe::class);
    }
    public function linje() 
    {
        return $this->hasMany(linje::class);
    }
}
