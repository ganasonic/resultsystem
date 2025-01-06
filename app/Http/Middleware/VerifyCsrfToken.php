<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/currentresult/postcurrent',
        '/currentresult/setStatus',
        '/currentresult/testinsert',
        '/result/insert',
        '/currentdmresult/postcurrent',
        '/currentdmresult/setStatus',
    ];
}
