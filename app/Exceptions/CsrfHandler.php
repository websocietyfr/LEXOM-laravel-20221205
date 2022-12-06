<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Throwable;

class CsrfHandler extends Exception
{
    // rendering
    public function render(Request $request) {
        if($this->getMessage()) {
            return response($this->getMessage(), 500);
        }
        return response('Formulaire incomplet, il manque le CSRF token', 500);
    }
}
