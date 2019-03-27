<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/27
 * Time: 9:52
 */
$router->group(['prefix' => 'v1', 'namespace' => '\App\Http\Controllers\V1'], function () use ($router) {
    $router->get('book/{id}', 'BookController@getBook');
    $router->get('books', 'BookController@getBooks');
    $router->post('book', 'BookController@createBook');
    $router->put('book/{id}', 'BookController@updateBook');
    $router->delete('book/{id}', 'BookController@deleteBook');
});