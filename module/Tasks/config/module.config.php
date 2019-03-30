<?php
namespace Tasks;



return [
    'router' => [
        'routes' => [
            'tasks' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/tasks[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\TasksController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'tasks' => __DIR__ . '/../view',
        ],
    ],
];