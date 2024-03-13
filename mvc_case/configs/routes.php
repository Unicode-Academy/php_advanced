<?php
$routes['default_controller'] = 'homecontroller';
$routes['users'] = 'usercontroller';
$routes['auth'] = 'authcontroller';
$routes['auth/do-login'] = 'authcontroller/handleLogin';
$routes['auth/do-register'] = 'authcontroller/handleRegister';
$routes['auth/active-account'] = 'authcontroller/showActive';
$routes['auth/resend-active'] = 'authcontroller/resendActive';
$routes['auth/forgot-password'] = 'authcontroller/forgotPassword';
$routes['auth/do-forgot-password'] = 'authcontroller/handleForgotPassword';