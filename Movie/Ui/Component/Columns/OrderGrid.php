<?php

namespace Magenest\Movie\Ui\Component\Columns;

use \Magento\Sales\Api\OrderRepositoryInterface;
use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Ui\Component\Listing\Columns\Column;
use \Magento\Framework\Api\SearchCriteriaBuilder;

class OrderGrid extends Column
{
    protected $_orderRepository;
    protected $_searchCriteria;

    public function __construct(ContextInterface $context, UiComponentFactory $uiComponentFactory, OrderRepositoryInterface $orderRepository, SearchCriteriaBuilder $criteria, array $components = [], array $data = [])
    {
        $this->_orderRepository = $orderRepository;
        $this->_searchCriteria = $criteria;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                 if($item["entity_id"] % 2 == 0)
                 {
                     $class = 'minor';
                     $value = 'Even';
                 }
                 else{
                     $class = 'notice';
                     $value = 'Odd';
                 }
                 //$item[$this->getData('name')]
                $item['oddeven'] = '<span class="grid-severity-' . $class . '">' . $value . '</span>';
            }
        }

        return $dataSource;
    }
}