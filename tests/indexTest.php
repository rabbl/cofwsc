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
}
