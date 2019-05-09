<?php
namespace Magenest\Movie\Model\Config\Source;
class DirectorOption implements \Magento\Framework\Option\ArrayInterface
{
    protected  $director = array();
    public function toOptionArray()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $collection = $objectManager->create('Magenest\Movie\Model\ResourceModel\Director\Collection');
        $this->director[] = ['value' => null, 'label' => '--Please Select--'];
        foreach($collection as $row){
            $this->director[] = ['value' => $row['director_id'], 'label' => $row['name']];
        }
        return $this->director;
    }
}