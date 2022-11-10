<?php 


namespace App\Filters\V1;

use App\Filters\ApiFilter;

class ProduktGruppeFilter extends ApiFilter {
    
    protected $allowInclude = [
        'produkt'
    ];

}