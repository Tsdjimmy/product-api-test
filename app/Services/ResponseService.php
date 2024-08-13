<?php

namespace App\Services;

use Illuminate\Http\Response;

class ResponseService
{
    public function success($data, $message = 'Success')
    {
        return response()->json(['message' => $message, 'data' => $data], 200);
    }

    public function error($message = 'Error', $code = 400)
    {
        return response()->json(['message' => $message], $code);
    }
}
