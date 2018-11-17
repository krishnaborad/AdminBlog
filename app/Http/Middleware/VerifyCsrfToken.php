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
      'admin/categorys',
      'admin/Nationality',
      'admin/Nationality/create_city',
      'admin/Nationality/create',
      'admin/pos',
      'admin/calendar',
      'admin/product',

    ];
}
