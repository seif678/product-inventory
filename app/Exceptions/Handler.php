<?php

use Illuminate\Validation\ValidationException;

function render($request, Throwable $exception)
{
    if ($exception instanceof ValidationException) {
        return response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => collect($exception->errors())
                ->map(fn($messages) => $messages[0])
        ], 422);
    }

    return parent::render($request, $exception);
}