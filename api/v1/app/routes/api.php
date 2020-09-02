
<?php
/*----------------------------------------------------------------------------------------------------------------------*/
//                                                                                                                      |   
//               IF RECEIBE PARAMETERS MUST USE CONTROLLER AND METHOD EXPLICIT IN THE ROUTE                             |
//                                                                                                                      | 
/*----------------------------------------------------------------------------------------------------------------------*/


Router::get('/', function ($session) {
    // $session->authentication("inside");
});
Router::get('/auth', 'AuthService@index');
Router::post('/auth/login', 'AuthService@login');
Router::post('/auth/logout', 'AuthService@destroy');

Router::get('/users', 'UserService@index');
Router::get('/users/edit', 'UserService@edit');
Router::post('/users/store', 'UserService@store');
Router::post('/users/delete', 'UserService@delete');
