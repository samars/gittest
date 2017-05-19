<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 17-02-2017
 * Time: 10:46
 */

namespace Fooman\BlogExample\Test\Constraint;

use Magento\Catalog\Test\Page\Product\CatalogProductView;
use Magento\Mtf\Constraint\AbstractConstraint;
use Magento\Catalog\Test\Fixture\CatalogProductSimple;
use Magento\Mtf\Client\BrowserInterface;

abstract class AssertExampleBlockExists extends AbstractConstraint
{
    /**
     * Assert that our example block is added
     *
     * @param CatalogProductView $catalogProductView
     * @param CatalogProductSimple $product
     * @param BrowserInterface $browser
     * @return void
     */
    public function processAssert(
        CatalogProductView $catalogProductView,
        CatalogProductSimple $product,
        BrowserInterface $browser
    ) {
        $browser->open($_ENV['app_frontend_url'] . $product->getUrlKey() . '.html');

        \PHPUnit_Framework_Assert::assertSame(
            'Hello world',
            $catalogProductView->getFoomanCatalogProductPageMainBlock()->getBlogExampleBlockText(),
            'Block not found.'
        );
    }

}