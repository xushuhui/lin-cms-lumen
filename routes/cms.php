<?php

$router->group(['prefix' => 'cms'], function () use ($router) {
    $router->get('user/login', function ()    {
        return 'user/login';
    });
});