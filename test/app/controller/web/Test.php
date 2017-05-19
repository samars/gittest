<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 14-02-2017
 * Time: 10:02
 */
namespace test\app\controller\web;
use Excellence\Hello\Block\HelloWorld;
use PHPUnit_Framework_TestCase;


class Test extends PHPUnit_Framework_TestCase{

    public function testHelloWorld(){
        $test1=new HelloWorld();
        $expected='7';
        $this->assertEquals($expected,$test1->sumTwoNum(5,2));



    }
    public function testSub(){
        $test2=new HelloWorld();
        $expected='3';
        $this->assertEquals($expected,$test2->subtractNum(6,3));

    }
}

