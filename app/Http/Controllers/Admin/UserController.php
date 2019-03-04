<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


use App\Helpers\LoggerHelper as logger;
use App\Helpers\ResponseHelper as response;



class UserController extends Controller
{

    public function __construct(){
        $this->middleware('age');

        $this->middleware('log', ['only' => [ //supports  (only & except)
            'fooAction',
            'barAction',
        ]]);

        $this->middleware('auth', ["only"=>[
            "home"
        ]]);
    }


    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }


    public function show2(Request $request,$id)
    {
        $arr = [
            "age"=> $request->input("age"),
            "id"=> $id,
            "path"=> $request->path(),
            "path is"=> $request->is('admin/*'),
            "url"=> $request->url(),
            "fullurl"=> $request->fullUrl(),
            "method"=> $request->method(),
            "isMethod"=> $request->isMethod('post')
        ];
        return $arr;
    }

    public function show3(Request $request){
        // dd($request->user());
        $content = "hello world";
        $status = 200;

        // Log::debug('An informational message.');
        // Log::channel('CustomLogFile1')->info('Something happened!');
        logger::$channel = "CustomLogFile1";
        logger::log("hello damn123");
        // return response::res("success","error happened");


        return response()
                ->json(["one"=>1,"two"=>2],200,[
                    'X-Header-One' => 'Header Value',
                    'X-Header-Two' => 'Header Value'
                ]);
    }




    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }
    }


}
