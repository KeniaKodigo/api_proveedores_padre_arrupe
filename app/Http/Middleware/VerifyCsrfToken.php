<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //solicitando token para el envio, actualizar o eliminar 
        'http://localhost/api_proveedores/public/registrar',
        'http://localhost/api_proveedores/public/actualizar/*',
        'http://localhost/api_proveedores/public/eliminar/*'
    ];
}
