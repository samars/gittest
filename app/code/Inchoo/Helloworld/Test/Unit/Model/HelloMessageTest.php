<?php
namespace Inchoo\Helloworld\Test\Unit\Model;

class HelloMessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HelloMessage
     */
    protected $helloMessage;
    protected $expectedMessage;

    public function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->helloMessage = $objectManager->getObject('Inchoo\Helloworld\Block\Helloworld');
        $this->expectedMessage = 'Hello world!';
    }

    public function testGetMessage()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->helloMessage = $objectManager->getObject('Inchoo\Helloworld\Block\Helloworld');
        $this->assertEquals($this->expectedMessage, $this->helloMessage->getHelloWorldTxt());
    }
}