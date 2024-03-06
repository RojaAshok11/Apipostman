<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Apicontroller extends Controller
{

    // public function create(Request $request)
    // {
    //     $students = new Student();

    //     $students->name = $request->input('name');
    //     $students->address = $request->input('address');
    //     $students->phone = $request->input('phone');

    //     $students->save();
    //     return response()->json($students);

    // }
    public function register(Request $request){
         $validator = Validator::make($request->all(),
          [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password'

          ]);

          if($validator->fails()){
            return response()->json(['message'=>'validator error'],401);

          }
          $data = $request->all();
          $data['password'] = Hash::make( $data['password']);
          $user = User::create($data);

          $response['token'] = $user->createToken();
          $response['name'] = $user->name;
          return response()->json($response,200);
    }
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            $user = Auth::user();
            $response['token'] = $user->createToken('Myapp');
            $response['name'] = $user->name;
            return response()->json($request,200);
        }else{
            return response()->json(['message'=>'invalid credentials error'],401);
        }

    }
    public function detail(){
        $user = Auth::user();
        $response['user'] = $user;
        return response()->json($response,200);

    }
}
