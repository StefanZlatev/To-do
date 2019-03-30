<?php
namespace Tasks;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include '../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\TasksTable::class => function($container) {
                    $tableGateway = $container->get(Model\TasksTableGateway::class);
                    return new Model\TasksTable($tableGateway);
                },
                Model\TasksTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Tasks());
                    return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\TasksController::class => function($container) {
                    return new Controller\TasksController(
                        $container->get(Model\TasksTable::class)
                    );
                },
            ],
        ];
    }

}