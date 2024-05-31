<?php

namespace System\Core;

class CustomException
{
    public function __construct()
    {

        set_exception_handler([$this, 'getException']);
    }

    public function getException($exception)
    {

        $code = $exception->getCode();
        if ($code == 404) {
            $this->loadView($code, $exception);
        } elseif ($code == 403) {
            $this->loadView($code, $exception);
        } else {
            $this->loadView('errors', $exception);
        }
    }

    public function loadView($code = '404', $exception = null)
    {
        echo view('errors.' . $code, ['exception' => $exception]);
    }
}
