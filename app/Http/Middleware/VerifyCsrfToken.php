<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware {
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>/\media\ashik\A1\.Trash-1000\files\portfolio-backend/app/Http/Middleware/VerifyCsrfToken.php
     */
    protected $except = [
        'api/*',
        '/login',
    ];
}
