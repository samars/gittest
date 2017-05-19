<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 14-02-2017
 * Time: 13:02
 */


namespace test\app\controller\web;
//require_once('PHPUnit/Extensions/Selenium2TestCase.php');
//use PHPUnit_Extensions_Selenium2TestCase;

class TestOnBrowser extends \PHPUnit_Extensions_Selenium2TestCase
{

    public function setUp()
    {
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowserUrl('http://127.0.0.1/magento2/admin');
        $this->setBrowser('firefox');
    }

    public function testCreateAnAccount()
    {
        $this->url('http://127.0.0.1/magento2/');
        $this->timeouts()->implicitWait(50000);
        $this->assertEquals('Home page',$this->title());
        $this->byXPath('html/body/div[1]/header/div[1]/div/ul/li[3]/a')->click();
        $this->timeouts()->implicitWait(50000);
        $this->byXPath('//*[@id=\'firstname\']')->value('samar');
        $this->byXPath('//*[@id=\'lastname\']')->value('sam');
        $this->byXPath('//*[@id=\'email_address\']')->value('satest@gmail.com');
        $this->byXPath('//*[@id=\'password\']')->value('Test@1234');
        $this->byXPath('//*[@id=\'password-confirmation\']')->value('Test@1234');
        $this->byXPath('//*[@id=\'form-validate\']/div/div[1]/button')->click();
        $this->timeouts()->implicitWait(50000);
        $this->assertEquals('My Account',$this->title());
        $this->timeouts()->implicitWait(50000);

    }
    public function testWithValidLogin(){
        $this->url('http://127.0.0.1/magento2/customer/account/login/');
        $this->byXPath('.//*[@id=\'email\']')->value('sam@gmail.com');
        $this->byXPath('//*[@id=\'pass\']')->value('Test@1234');
        $this->byXPath('//*[@id=\'send2\']')->click();
        $this->timeouts()->implicitWait(5000);
        $this->assertEquals('My Account',$this->title());

    }
    public function testaddToCart(){
       try {
           $this->url('http://127.0.0.1/magento2/tshirt.html');
           $this->waitUntil($this->byXPath('//*[@id=\'maincontent\']/div[3]/div[1]/div[3]/ol/li[1]/div/a/span/span')->displayed());
           $this->moveto($this->byXPath('//*[@id=\'maincontent\']/div[3]/div[1]/div[3]/ol/li/div'));
           $this->byXPath('//*[@id=\'maincontent\']/div[3]/div[1]/div[3]/ol/li/div/div/div[2]/div/div[1]/form/button')->click();
           sleep(200);
       }catch(Exception $e){
           echo 'e';
        }

    }
    public function tearDown(){
        $this->close();
    }



}
