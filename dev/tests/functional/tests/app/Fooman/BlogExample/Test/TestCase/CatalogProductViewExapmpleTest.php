<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 17-02-2017
 * Time: 10:22
 */

namespace Fooman\BlogExample\Test\TestCase;


use Magento\Catalog\Test\Page\Adminhtml\CatalogProductIndex;
use Magento\Catalog\Test\Page\Adminhtml\CatalogProductNew;
use Magento\Mtf\Fixture\FixtureFactory;
use Magento\Mtf\TestCase\Injectable;

class CatalogProductViewExapmpleTest extends Injectable
{
    public function __inject(
        CatalogProductIndex $catalogProductIndex,
        CatalogProductNew $catalogProductNew,
        FixtureFactory $fixtureFactory)
    {
        $this->catalogProductIndex = $catalogProductIndex;
        $this->catalogProductNew = $catalogProductNew;
        $this->fixtureFactory = $fixtureFactory;

    }
    public function test($product){
        list($fixture,$dataset)=explode('::',$product);
        $product=$this->fixtureFactory->crateByCode($fixture,['dataset' =>$dataset]);
        $this->catalogProductIndex->open();
        $this->catalogProductIndex->getGridPageActionBlock()->addProduct();
        $this->catalogProductNew->getProductForm()->fill($product);
        $this->catalogProductNew->getFormPageActions()->save($product);

        return ['product' => $product];

    }
}