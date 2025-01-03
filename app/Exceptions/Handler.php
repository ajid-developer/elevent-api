<?php

namespace App\Exceptions;

use ErrorException;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            $this->reportable(function (Throwable $e) {
                Log::error($e->getMessage());
            });

            $this->renderable(function (ValidationException $e, $request) {
                $response = config('rc.invalid_data');
                $response['error'] = $e->errors();

                return response()->json($response, 400);
            });

            $this->renderable(function (AuthenticationException $e, $request) {
                return response()->json(config('rc.unauthenticated'), 401);
            });

            $this->renderable(function (JWTException $e, $request) {
                return response()->json(config('rc.unauthenticated'), 401);
            });

            $this->renderable(function (TokenBlacklistedException $e, $request) {
                return response()->json(config('rc.unauthenticated'), 401);
            });

            $this->renderable(function (TokenExpiredException $e, $request) {
                return response()->json(config('rc.unauthenticated'), 401);
            });

            $this->renderable(function (UnauthorizedException $e, $request) {
                return response()->json(config('rc.forbidden'), 403);
            });

            $this->renderable(function (AuthorizationException $e, $request) {
                return response()->json(config('rc.forbidden'), 403);
            });

            $this->renderable(function (AccessDeniedHttpException $e, $request) {
                return response()->json(config('rc.forbidden'), 403);
            });

            $this->renderable(function (NotFoundHttpException $e, $request) {
                $error = str_starts_with($e->getMessage(), 'The route')
                    ? config('rc.url_not_reachable')
                    : config('rc.record_not_found');
                return response()->json($error, 404);
            });

            $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
                return response()->json(config('rc.method_not_allowed'), 405);
            });

            $this->renderable(function (ThrottleRequestsException $e, $request) {
                return response()->json(config('rc.too_many_request'), 429);
            });

            $this->renderable(function (QueryException $e, $request) {
                return response()->json(config('rc.internal_server_error'), 500);
            });

            $this->renderable(function (ErrorException $e, $request) {
                return response()->json(config('rc.internal_server_error'), 500);
            });

            $this->renderable(function (HttpException $e) {
                return match ($e->getStatusCode()) {
                    401 => response()->json(config('rc.unauthenticated'), 401),
                    403 => response()->json(config('rc.forbidden'), 403),
                    404 => response()->json(config('rc.record_not_found'), 404),
                    405 => response()->json(config('rc.method_not_allowed'), 405),
                    default => response()->json(config('rc.internal_server_error'), 500)
                };
            });

            $this->renderable(function (Exception $e, $request) {
                return response()->json(config('rc.internal_server_error'), 500);
            });
        });
    }
}
