<?php
namespace Magenest\Movie\Model;

use Magenest\Movie\Model\ResourceModel\Movie\CollectionFactory;
use Magenest\Movie\Model\Movie;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $movieCollectionFactory,
        array $meta = [],
        array $data = []
    ){
        $this->collection = $movieCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->_loadedData)) {
            return $this->_loadedData;
        }

        $items = $this->collection->getItems();

        foreach($items as $movie)
        {
            $this->_loadedData[$movie->getId()] = $movie->getData();
        }

        return $this->_loadedData;
    }

}
