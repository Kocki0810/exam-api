<?php 


namespace App\Filters\V1;

use App\Filters\ApiFilter;

class OrdreFilter extends ApiFilter {
    
    protected $allowInclude = [
        'linje'
    ];

}