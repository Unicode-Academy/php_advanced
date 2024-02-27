<?php
//GuestMiddleware Middleware

class GuestMiddleware extends Middlewares
{
    public function handle()
    {
        $request = new Request();
        $response = new Response;
        $exclude = [
            '/auth/logout'
        ];
        $path = $request->getPath();
        if (Session::data('user_login') && !in_array($path, $exclude)) {
            return $response->redirect('/');
        }
    }
}
