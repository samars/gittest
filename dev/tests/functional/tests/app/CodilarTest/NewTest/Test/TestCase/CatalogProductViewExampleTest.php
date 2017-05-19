<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 13-02-2017
 * Time: 16:01
 */
namespace CodilarTest\NewTest\Test\TestCase;

use Magento\Catalog\Test\Page\Adminhtml\CatalogProductIndex;
use Magento\Catalog\Test\Page\Adminhtml\CatalogProductNew;
use Magento\Mtf\Fixture\FixtureFactory;
use Magento\Mtf\TestCase\Injectable;

class CatalogProductViewExampleTest extends Injectable
{
    protected $CPI;
    protected $CPN;
    public function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);
        $this->CPI = $objectManager->getObject('Magento\Catalog\Test\Page\Adminhtml\CatalogProductIndex');
        $this->CPN = $objectManager->getObject('Magento\Catalog\Test\Page\Adminhtml\CatalogProductNew');

    }

    /**
    ...
     */
    public function __inject(
        CatalogProductIndex $catalogProductIndex,
        CatalogProductNew $catalogProductNew,
        FixtureFactory $fixtureFactory
    ) {
        $this->catalogProductIndex = $catalogProductIndex;
        $this->catalogProductNew = $catalogProductNew;
        $this->fixtureFactory = $fixtureFactory;
    }

    /**
    ...
     */
    public function testProducts($product)
    {
        list($fixture, $dataset) = explode('::', $product);
        $product = $this->fixtureFactory->createByCode($fixture, ['dataset' => $dataset]);
        $this->CPI->open();
        $this->CPI->getGridPageActionBlock()->addProduct();
        $this->catalogProductNew->getProductForm()->fill($product);
        $this->catalogProductNew->getFormPageActions()->save($product);
        $this->assertEquals('dgty',$this->getStatusMessage());

        return ['product' => $product];
    }
}