<?php
/**
 * Created by PhpStorm.
 * User: Rycka
 * Date: 15.5.24
 * Time: 21.38
 */

class ExampleTest extends PHPUnit_Framework_TestCase {
    public function testTest() {
        $response = true;
        $this->assertTrue($response);
        $this->assertEquals(true, $response);
    }
    public function testTest2() {
        $response = false;
        $this->assertFalse($response);
    }
}
