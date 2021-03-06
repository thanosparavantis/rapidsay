<?php

namespace Forum\Exceptions;

use App;
use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if (App::environment('production'))
        {
            if ($e instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException)
            {
                abort(404);
            }
            else if ($e instanceof \Illuminate\Session\TokenMismatchException)
            {
                return response()->view('errors.error', ['message' => trans('error.token')]);
            }
        }

        if ($request->ajax()) {
            if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json(['code' => 404, 'message' => 'Invalid request.'], 404);
            }
        }

        return parent::render($request, $e);
    }
}
