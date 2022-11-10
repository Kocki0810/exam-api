<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class linje extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "linjer";

    protected $fillable = [
        'produkt_id',
        'ordre_id',
        'bontekst',
        'pris',
        'antal',
        'date',
    ];
    
    public function produkt() 
    {
        return $this->hasOne(produkt::class);
    }
    public function ordre() 
    {
        return $this->hasOne(ordre::class);
    }
}
