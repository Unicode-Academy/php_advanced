<?php
//AuthMiddleware Middleware

class AuthMiddleware extends Middlewares
{
    public function handle()
    {
        $request = new Request();
        $response = new Response();
        $path = $request->getPath();
        $exclude = [
            '/auth/login',
            '/auth/register',
            '/auth/do-login'
        ];
        if (!in_array($path, $exclude)) {
            if (!Session::data('user_login')) {
                $response->redirect('/auth/login');
            }
        }
    }
}
