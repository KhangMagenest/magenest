<?php
namespace Magenest\Movie\Model\Config\Source;
class ActorOption implements \Magento\Framework\Option\ArrayInterface
{
    protected  $actor = array();
    public function toOptionArray()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $collection = $objectManager->create('Magenest\Movie\Model\ResourceModel\Actor\Collection');
        $this->actor[] = ['value' => 0, 'label' => '--Please Select--'];
        foreach($collection as $row){
            $this->actor[] = ['value' => $row['actor_id'], 'label' => $row['name']];
        }
        return $this->actor;
    }
}