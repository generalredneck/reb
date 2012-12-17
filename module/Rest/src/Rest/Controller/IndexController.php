<?php
namespace Rest\Controller;

use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use stdClass;

class IndexController extends AbstractRestfulController
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }
    public function getList()
    {
        $obj = new stdClass();
        $obj->brain = 'blah';
        $model = new JsonModel(array(
            'data' => $obj
        ));
        return $model;
    }

    public function get($id)
    {
        return array(
          1 => array( 'blah' => 'bleh'),
        );
        # code...
    }

    public function create($data)
    {
        # code...
    }

    public function update($id, $data)
    {
        # code...
    }

    public function delete($id)
    {
        # code...
    }

    public function syncAction(){
      return new JsonModel(array("works"));
    }
}
