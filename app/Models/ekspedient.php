<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ekspedient extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "ekspedienter";

    protected $fillable = [
        'firma_id',
        'bruger_id',
        'kortnummer',
        'navn',
    ];

    public function firma() 
    {
        return $this->hasOne(firma::class);
    }
    public function bruger()
    {
        return $this->hasOne(bruger::class);
    }
    public function ordre() 
    {
        return $this->hasMany(ordre::class);
    }
    
}
