<?php
$router->get('/', 'PagesController@index');
$router->get('about', 'PagesController@about');
$router->get('contact', 'PagesController@contact');
$router->post('names', 'PagesController@addName');
$router->get('users', 'UsersController@index');