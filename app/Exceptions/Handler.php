<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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


    public function render($request, Exeception $exception)  {
        // replace 404  with a json response
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resources not found'
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
