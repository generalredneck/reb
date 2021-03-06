<?php

namespace AlbumRest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;

use Album\Model\Album;          // <-- Add this import
use Album\Form\AlbumForm;       // <-- Add this import
use Album\Model\AlbumTable;     // <-- Add this import

class AlbumRestController extends AbstractRestfulController
{
    protected $albumTable;

    public function getList()
    {
        $data = array(
          array( 'blah' => 'bleh'),
          array( 'blah' => 'bleh'),
          );


        return array('data' => $data);
    }

    public function get($id)
    {
        $album = $this->getAlbumTable()->getAlbum($id);

        return array("data" => $album);
    }

    public function create($data)
    {
        $form = new AlbumForm();
        $album = new Album();
        $form->setInputFilter($album->getInputFilter());
        $form->setData($data);
        if ($form->isValid()) {
            $album->exchangeArray($form->getData());
            $id = $this->getAlbumTable()->saveAlbum($album);
        }

        return $this->get($id);
    }

    public function update($id, $data)
    {
        $data['id'] = $id;
        $album = $this->getAlbumTable()->getAlbum($id);
        $form  = new AlbumForm();
        $form->bind($album);
        $form->setInputFilter($album->getInputFilter());
        $form->setData($data);
        if ($form->isValid()) {
            $id = $this->getAlbumTable()->saveAlbum($form->getData());
        }

        return $this->get($id);
    }

    public function delete($id)
    {
        $this->getAlbumTable()->deleteAlbum($id);

        return array('data' => 'deleted');
    }

    public function getAlbumTable()
    {
        if (!$this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('Album\Model\AlbumTable');
        }
        return $this->albumTable;
    }
}
