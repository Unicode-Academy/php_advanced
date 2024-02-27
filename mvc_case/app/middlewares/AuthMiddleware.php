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

        $auth = $this->checkAuth();

        View::share([
            'auth' => $auth
        ]);

        if (!in_array($path, $exclude)) {
            if (!$auth) {
                $response->redirect('/auth/login');
            }
        }
    }

    public function checkAuth()
    {
        $userLogin = Session::data('user_login');
        $auth = [];
        if ($userLogin) {
            $userModel = Load::model('User');
            $user = $userModel->getUser($userLogin['id']);

            if ($user) {
                if ($user['status']) {
                    //Hoạt động
                    $auth = $user;
                } else {
                    Session::delete('user_login');
                }
            } else {
                Session::delete('user_login');
            }
        }
        return $auth;
    }
}
