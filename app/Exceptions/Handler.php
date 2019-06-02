<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

//gilasweb.ir
use Verta;
use Illuminate\Support\Facades\Auth;
use App\userlog;

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

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //gilasweb.ir // start
        if ($this->isHttpException($exception))
        {
            return $this->renderHttpException($exception);
        }
        else if($exception instanceof NotFoundHttpException)
        {
            return response()->view('errors.404');
        }
        else
        {
            userlog::create([
                'userid' => (isset(Auth::user()->id))?Auth::user()->id:'کاربر مهمان',
                'username' => (isset(Auth::user()->name))?Auth::user()->name:'کاربر مهمان',
                'userrole' => (isset(Auth::user()->role))?Auth::user()->role:'کاربر مهمان',
                'userip' => GetRealIp(),
                'useragent' => $_SERVER['HTTP_USER_AGENT'],
                'path' => "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",
                'description' => $exception->getMessage(),
                'jalalitimestamps' => verta()
            ]);

            if($exception->getMessage() == 'Unauthenticated.' || $exception->getMessage() == 'The given data failed to pass validation.')
                return parent::render($request, $exception);
            else
                return parent::render($request, $exception);
                return redirect()->back()->withErrors($exception->getMessage());
        }
        //gilasweb.ir // end
    }
}
