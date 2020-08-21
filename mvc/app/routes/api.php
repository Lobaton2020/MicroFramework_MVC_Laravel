
<?php
/*----------------------------------------------------------------------------------------------------------------------*/
//                                                                                                                      |   
//               IF RECEIBE PARAMETERS MUST USE CONTROLLER AND METHOD EXPLICIT IN THE ROUTE                             |
//                                                                                                                      | 
/*----------------------------------------------------------------------------------------------------------------------*/


Router::get('/', function ($session) {
    $session->authentication("inside");
});
Router::get('/auth', 'AuthServicer@index');
Router::post('/auth/login', 'AuthServicer@login');

Router::get('/main', 'UserServicer@index');
Router::get('/main/logout', 'UserServicer@sessionDestroy');
Router::get('/users', 'UserServicer@index');
Router::get('/users/edit', 'UserServicer@edit');
Router::post('/users/save', 'UserServicer@save');

Router::get('/auth/session', 'AuthServicer@getSession');
