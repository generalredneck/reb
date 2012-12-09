<?php
namespace Rest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\ViewModel;
use stdClass;

class IndexController extends AbstractRestfulController
{
    public function getList()
    {
        $obj = new stdClass();
        $obj->brain = 'blah';
        $data = array(
          $obj
        );
        return array(
            'data' => $obj
        );
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
}
