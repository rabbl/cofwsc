<?php
namespace Greetings\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Calendar\Model\LeapYear;

class GreetingsController
{
    public function helloAction(Request $request, $name)
    {
        return new Response('Hello '.$name);
    }

    public function byeAction()
    {
        return new Response('Goodbye');
    }
}