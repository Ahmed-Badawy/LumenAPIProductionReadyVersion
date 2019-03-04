<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->group(['namespace' => '\Rap2hpoutre\LaravelLogViewer'], function() use ($router) {
    $router->get('logs-pass=01111988246', 'LogViewerController@index');
});



$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/foo[/{id}]', function ($id="unknowen") {
    return 'Hello World: '.$id;
});

$router->post('foo', function () {
    return 'Hello World from post';
});

$router->get('posts/{postId}/comments/{commentId}', function ($postId, $commentId) {
    return 'Hello World '.$postId.$commentId;
});

$router->get('user/{name:[1-9]+}', function ($name) {
    // return 'Hello World '.$name;

//this is how to generate url to a named route
    // $url = route('profile', ['id' => 1]);
    // return $url;

//this is how to redirect to a named route
    return redirect()->route('profile',["id"=>111]);
});

//named routes
$router->get('user/{id:[1-9]+}/profile', ['as' => 'profile', function ($id) {
    return 'from named route '.$id;
}]);


$router->get('/user2/{id}', "Admin\UserController@show");


$router->group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['age:testrole']], function () use ($router) {
    $router->get('/', function () {
        return "hello from this route";
    });

    $router->get('/user2/{id}', "UserController@show2");
});


$router->get('/res3', "Admin\UserController@show3");



$router->post('/auth', "Admin\UserController@authenticate");




$router->post('auth/login','AuthController@authenticate');
$router->group(['middleware' => 'jwt_auth'], function() use ($router) {
        $router->get('auth/users', function() {
            $users = \App\User::all();
            return response()->json($users);
        });
    }
);