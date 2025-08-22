<?php

namespace App\Exceptions;

use Exception;

class NotFound extends Exception
{
    public function render($request)
    {
        return response()->json(data: ['message' => $this->getMessage()], status: 404);
    }
}
