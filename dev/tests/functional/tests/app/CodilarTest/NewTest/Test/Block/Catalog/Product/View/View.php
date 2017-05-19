<?php
// tests/functional/tests/app/CodilarTest/NewTest/Test/Block/Catalog/Product/View.php
namespace CodilarTest\NewTest\Test\Block\Catalog\Product\View;

use Magento\Mtf\Block\Block;
use Magento\Mtf\Client\Locator;

/**
 * Class View
 * Catalog product page view block
 */
class View extends Block
{
    /**
     * Check if blog example block exists
     *
     * @var string
     */
    protected $blockSelector = '.fooman-blog-example';

    /**
     * @return string
     */
    public function getBlogExampleBlockText()
    {
        return $this->_rootElement->find($this->blockSelector, Locator::SELECTOR_CSS)->getText();
    }
}