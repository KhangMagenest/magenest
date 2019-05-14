<?php

namespace Magenest\Movie\Block\Adminhtml;

use Magento\Framework\View\Element\Template;

class SaleInfo extends Template
{
    private $_orderCollectionFactory;

    public function __construct(
        Template\Context $context,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        array $data = [])
    {

        parent::__construct($context, $data);
        $this->_orderCollectionFactory = $orderCollectionFactory;
    }
    public function getProducts() {
        $orderCollecion = $this->orderCollectionFactory->create()->addFieldToSelect('*');
        return $orderCollecion;
    }
}
