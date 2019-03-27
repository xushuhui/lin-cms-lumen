<?php

$router->group(['prefix' => 'cms','namespace' => '\App\Http\Controllers\Cms'], function () use ($router) {
    $router->post('user/login', 'UserController@login');
    $router->get('user/auths', 'UserController@auths');

});