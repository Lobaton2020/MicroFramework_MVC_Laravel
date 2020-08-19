
<?php
/*----------------------------------------------------------------------------------------------------------------------*/
//                                                                                                                      |   
//               IF RECEIBE PARAMETERS MUST USE CONTROLLER AND METHOD EXPLICIT IN THE ROUTE                             |
//                                                                                                                      | 
/*----------------------------------------------------------------------------------------------------------------------*/


Router::get('/', function ($session) {
    $session->authentication("inside");
});
Router::get('/auth', 'AuthController@index');
Router::post('/auth/login', 'AuthController@login');

Router::get('/main', 'UserController@index');
Router::get('/main/logout', 'UserController@sessionDestroy');
Router::get('/users', 'UserController@index');
Router::get('/users/edit', 'UserController@edit');

Router::get('/auth/session', 'AuthController@getSession');
