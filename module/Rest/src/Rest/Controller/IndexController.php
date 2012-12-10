<?php
namespace Rest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use stdClass;

class IndexController extends AbstractRestfulController
{
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
