<?php
interface AuthInterface extends IBar, ArrayAcces {

    const _MSG_TEMPLATE = [
        'required' => 'Field {name} is required'
    ];

    public function login();

    public function register();

    public function forgotPassword();

    public function resetPassword();

    public function activeAccount();
}