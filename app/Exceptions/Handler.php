<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
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

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return $this->handleAPIException($exception, $request);
        }

        if ($exception instanceof ModelNotFoundException) {
            $model = strtolower(basename($exception->getModel()));
            return $this->errorResponse("No existe ninguna instancia del modelo {$model} con el UID especificado", 404);
        }

        if ($exception instanceof AuthenticationException) {
            return $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof AuthorizationException) {
            return $this->errorResponse($exception->getMessage(), 403);
        }

        if ($exception instanceof RouteNotFoundException) {
            return $this->errorResponse('No se encontró la ruta especificada', 404);
        }

        if ($exception instanceof NotFoundHttpException) {
            return $this->errorResponse('No se encontró la URL especificada', $exception->getStatusCode());
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return $this->errorResponse('El método especificado en la opetición no és válido', $exception->getStatusCode());
        }

        if ($exception instanceof HttpException) {
            return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
        }

        if ($exception instanceof QueryException) {
            $code = $exception->errorInfo[1];

            if ($code == 1451) {
                return $this->errorResponse('No se puede eliminar de forma permanente el recurso porque está realacionado con algún otro.', 409);
            }

            return $this->errorResponse($exception->getMessage(), 409);
        }

        // if (env('APP_DEBUG')) {
        //     return $this->errorResponse('Error inesperado. Intente luego, si la falla persiste pongase en contacto con nosotros. supportTI@yamaha.com.mx', 500);
        // }

        return parent::render($request, $exception);
    }

    private function handleAPIException(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();
        return $this->errorResponse($errors, 422);
    }
}
