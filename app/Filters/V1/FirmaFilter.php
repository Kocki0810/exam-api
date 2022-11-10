<?php 


namespace App\Filters\V1;

use App\Filters\ApiFilter;

class FirmaFilter extends ApiFilter {
    
    protected $allowInclude = [
        'ekspedient',
        'bruger',
        'ordre',
        'produkt',
        'produktgruppe'
    ];

}