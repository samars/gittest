<?php
/**
 * Created by PhpStorm.
 * User: Sam
 * Date: 17-02-2017
 * Time: 10:43
 */

namespace Fooman\BlogExample\Test\Block\Catalog\Product;
use Magento\Mtf\Block\Block;
use Magento\Mtf\Client\Locator;

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