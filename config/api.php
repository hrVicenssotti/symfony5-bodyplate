<?php

use App\Infra\Http\Controller\UserController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes): void {
    $routes
        ->add('user_create', '/user/create')
        ->controller([UserController::class, 'create'])
        ->methods(['POST'])
    ;

    $routes
        ->add('user_list', '/user/list')
        ->controller([UserController::class, 'list'])
        ->methods(['GET'])
    ;

    $routes
        ->add('user_show', '/user/{id}')
        ->controller([UserController::class, 'view'])
        ->methods(['GET'])
    ;

    $routes
        ->add('user_delete', '/user/{id}')
        ->controller([UserController::class, 'delete'])
        ->methods(['DELETE'])
    ;
};
