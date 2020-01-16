<?php
namespace App\Application\Cont;
use App\Application\Inter\Bar;

class BarManager
{

    public $mailer;

    public function __construct(Bar $bar,$param)
    {
        echo $param;
        $this->mailer = $bar;
    }

    public function register($email, $password)
    {
        // The user just registered, we create his account
        // ...

        // We send him an email to say hello!
        $this->mailer->test($email, 'Hello and welcome!');
    }

    public function mail($recipient, $content)
    {
        $this->mailer->test("1","2");
    }
}