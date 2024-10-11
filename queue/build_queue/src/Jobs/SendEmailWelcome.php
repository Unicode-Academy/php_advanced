<?php

namespace UnicodeQueue\Jobs;

class SendEmailWelcome
{
    public $message;
    public $email;
    public function __construct($message, $email)
    {
        $this->message = $message;
        $this->email = $email;
    }

    public function handle()
    {
        //Viết logic xử lý của job
        // echo '<pre>';
        // print_r($this->data);
        // echo '</pre>';
    }
}