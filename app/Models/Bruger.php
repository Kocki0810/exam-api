<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bruger extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = "brugere";

    protected $fillable = [
        'firma_id',
        'ekspedient_id',
        'navn',
        'username',
        'password',
        'last_login',
        'last_IP',
        'adgangsgruppe',
        'email',
        'telefon',
    ];
    
    public function firma()
    {
        return $this->hasOne(firma::class);
    }
    public function ekspedient()
    {
        return $this->hasOne(ekspedient::class);
    }
    
}
