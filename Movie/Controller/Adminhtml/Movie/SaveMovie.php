<?php

namespace Magenest\Movie\Controller\Adminhtml\Movie;

class SaveMovie extends \Magento\Backend\App\Action
{

    const ADMIN_RESOURCE = 'Index';

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
                if($data['director_id'] != 0) {
                    $movie->setDirectorid($data['director_id']);
                }
               $movie->save();
//
                if(sizeof($data['actor_id']) != 1 && $data['actor_id'][0] != 0){
                    foreach($data['actor_id'] as $value){
                        $movieactor = $this->_objectManager->create("Magenest\Movie\Model\MovieActor");
                        $movieactor->setMovieid($data['name']);
                        $movieactor->setActorid($value);
                        $movieactor->save();
                        $id = $movieactor->lastInsertId();
                        echo $id;
                    }
                }
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                return $resultRedirect->setPath('*/movie/movie/movie');
            } catch (\Exception $d) {
                $this->messageManager->addError($d->getMessage());
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                return $resultRedirect->setPath('*/*/edit', ['id' => $movie->getId()]);
            }
        }
        return $resultRedirect->setPath('*/movie/movie/movie');

    }
}