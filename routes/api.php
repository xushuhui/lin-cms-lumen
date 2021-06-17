<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://blog.phpst.cn
 */
$router->group(['prefix' => 'api', 'namespace' => '\App\Http\Controllers\api','middleware' => 'auth'], function () use ($router) {
    $router->get('book/{id}', 'BookController@getBook');
    $router->get('books', 'BookController@getBooks');
    $router->post('book', 'BookController@createBook');
    $router->put('book/{id}', 'BookController@updateBook');
    $router->delete('book/{id}', 'BookController@deleteBook');
});