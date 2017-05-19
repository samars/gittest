<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 16-02-2017
 * Time: 12:42
 */
namespace Inchoo\Helloworld\Block;

class Helloworld extends \Magento\Framework\View\Element\Template
{
    public function getHelloWorldTxt()
    {
        return 'Hello world!';
    }
}