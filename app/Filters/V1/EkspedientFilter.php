<?php 


namespace App\Filters\V1;

use App\Filters\ApiFilter;

class EkspedientFilter extends ApiFilter {
    
    protected $allowInclude = [
        'bruger'
    ];

}