<?php

namespace Magenest\Movie\Controller\Adminhtml\Movie;

class SaveMovie extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;
    protected $movieFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\Movie\Model\MovieFactory $movieFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->movieFactory = $movieFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            try {

                $movie = $this->_objectManager->create("Magenest\Movie\Model\Movie");
                $movie->setName($data['name']);
                $movie->setDescription($data['description']);
                $movie->setRating($data['rating']);
                if($data['director_id'] != null) {
                    $movie->setDirector_id($data['director_id']);
                }
                $movie->save();
                $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
                $moviecollection = $objectManager->create('Magenest\Movie\Model\ResourceModel\Movie\Collection');
                $id = $moviecollection->getLastItem()['movie_id'];
                if(sizeof($data['actor_id']) <= 1 && ($data['actor_id'])[0] != null){
                    foreach($data['actor_id'] as $value){
                        $movieactor = $this->_objectManager->create("Magenest\Movie\Model\MovieActor");
                        $movieactor->setMovie_id($id);
                        $movieactor->setActor_id($value);
                        $movieactor->save();
                    }
                }
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('*/movie/movie/movie');
            } catch (\Exception $d) {
                $this->messageManager->addError($d->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $movie->getMovieId()]);
            }
        }
       // return $resultRedirect->setPath('*/movie/movie/movie');

    }
}