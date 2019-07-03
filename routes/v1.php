<?php
/**
 * Copyright (c) 2019 - xushuhui
 * Author: xushuhui
 * 微信公众号: 互联网工程师
 * Email: xushuhui@qq.com
 * 博客: https://www.phpst.cn
 */
$router->group(['prefix' => 'v1', 'namespace' => '\App\Http\Controllers\V1','middleware' => 'auth'], function () use ($router) {
    $router->get('book/{id}', 'BookController@getBook');
    $router->get('books', 'BookController@getBooks');
    $router->post('book', 'BookController@createBook');
    $router->put('book/{id}', 'BookController@updateBook');
    $router->delete('book/{id}', 'BookController@deleteBook');
});