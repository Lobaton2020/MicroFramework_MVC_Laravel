
<?php
/*----------------------------------------------------------------------------------------------------------------------*/
//                                                                                                                      |   
//               FIRST PARAMETER RECEIBER TEO NAMES AND TWO '/' ELSE WILL DO ERROR, AND EXCEPTION ONLY PUT  '/'         |
//                                                                                                                      | 
/*----------------------------------------------------------------------------------------------------------------------*/


Router::get('/', 'UserController@index');
Router::get('/users/index', 'UserController@index');
Router::get('/users/create', 'UserController@create');
Router::get('/users/edit', 'UserController@edit');
Router::post('/users/update', 'UserController@update');
Router::post('/users/store', 'UserController@store');
Router::post('/users/delete', 'UserController@delete');
