<?php 


namespace App\Filters\V1;

use App\Filters\ApiFilter;

class BrugerFilter extends ApiFilter {
    
    protected $allowInclude = [
        'ekspedient'
    ];

}