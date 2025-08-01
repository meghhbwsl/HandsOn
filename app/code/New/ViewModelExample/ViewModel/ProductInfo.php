<?php
namespace New\ViewModelExample\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Pricing\Helper\Data as PriceHelper;

class ProductInfo implements ArgumentInterface
{
    protected $priceHelper;
    protected $product;

    public function __construct(
        PriceHelper $priceHelper,
        ProductInterface $product = null
    ) {
        $this->priceHelper = $priceHelper;
        $this->product = $product;
    }

    public function getGreeting(): string
    {
        return "Hello from ViewModel!";
    }

    public function getCurrentTime(): string
    {
        return date("Y-m-d H:i:s");
    }

    public function getProductSku(): string
    {
        return $this->product ? $this->product->getSku() : 'No product loaded';
    }

    public function formatPrice($amount): string
    {
        return $this->priceHelper->currency($amount, true, false);
    }
}
