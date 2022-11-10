<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class firma extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "firma";

    protected $fillable = ['navn'];

    public function bruger() 
    {
        return $this->hasMany(bruger::class);
    }
    public function ekspedient() 
    {
        return $this->hasMany(ekspedient::class);
    }

    public function produktgruppe() 
    {
        return $this->hasMany(produktgruppe::class);
    }
    
    public function produkt() 
    {
        return $this->hasMany(produkt::class);
    }

    public function ordre() 
    {
        return $this->hasMany(ordre::class);
    }
}
