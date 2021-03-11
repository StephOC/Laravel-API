<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];


    public function render($request, Throwable $exception)  {
        // replace 404  with a json response
        if ($exception instanceof ModelNotFoundException &&
            $request->wantsJson()) 
            {
            return response()->json([
                'error' => 'Resource not found' 
            ], 404);
        }

        return parent::render($request, $exception);
    }

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function(InvalidOrderException $e, $request) {
               return response()->json([
                'error' => 'resource not found'
            ], 404);
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
