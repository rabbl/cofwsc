<?php


class IndexTest extends \PHPUnit_Framework_TestCase
{
    public function testPostHello()
    {
        $_SERVER['ORIG_PATH_INFO'] = '/hello/Fabien';
        $_GET['name'] = 'Fabien';
        ob_start();
        include '../web/front.php';
        $content = ob_get_clean();
        $this->assertContains('Hello Fabien', $content);
    }

    public function testGoodbye()
    {
        $_SERVER['ORIG_PATH_INFO'] = '/bye';
        ob_start();
        include '../web/front.php';
        $content = ob_get_clean();
        $this->assertContains('Goodbye', $content);
    }

    public function testThrowsNotFoundException()
    {
        $this->expectExceptionMessage('Not Found');
        $_SERVER['ORIG_PATH_INFO'] = '/not_available_url';
        ob_start();
        include '../web/front.php';
        ob_get_clean();
    }

    public function testLeapYearRoute()
    {
        $_SERVER['ORIG_PATH_INFO'] = '/is_leap_year';
        ob_start();
        include '../web/front.php';
        $content = ob_get_clean();
        $this->assertContains('leap year', $content);
    }

    public function testLeapYearRouteWithLeapYear()
    {
        $_SERVER['ORIG_PATH_INFO'] = '/is_leap_year/2004';
        ob_start();
        include '../web/front.php';
        $content = ob_get_clean();
        $this->assertContains('Yep, this is leap year!', $content);
    }

    public function testLeapYearRouteWithNoLeapYear()
    {
        $_SERVER['ORIG_PATH_INFO'] = '/is_leap_year/2005';
        ob_start();
        include '../web/front.php';
        $content = ob_get_clean();
        $this->assertContains('Nope, is not a leap year.', $content);
    }
}
