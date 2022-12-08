<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class ModelNotFoundHandler extends Exception
{
    public function render(Request $request) {
        return response('<h1>L\'entité n\'a pas été trouvée</h1>', 404)->header('Content-type', 'text/html');
    }
}
