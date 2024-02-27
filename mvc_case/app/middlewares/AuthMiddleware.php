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
            '/auth/register'
        ];
        if (!in_array($path, $exclude)) {
            $response->redirect('/auth/login');
        }
    }
}
