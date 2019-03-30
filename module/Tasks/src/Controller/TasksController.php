<?php
namespace Tasks\Controller;

use Tasks\Model\AlbumTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TasksController extends AbstractActionController
{
    private $table;

    public function __construct(TasksTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'tasks' => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}