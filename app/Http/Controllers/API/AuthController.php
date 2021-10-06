<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Controllers\API\ResponseController as ResponseController;

class AuthController extends ResponseController
{
    public function register(UserRegisterRequest $request)
    {
        $input = $request->validated();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 201);
    }

    public function login(Request $request)
    {
    	$user = User::where('email',$request->email)->first();
    	if (!is_null($user)) {
    		if (Hash::check($request->password,$user->password)) {
    			$success['token'] =  $user->createToken('MyApp')->accessToken;
        		$success['name'] =  $user->name;

        		return $this->sendResponse($success, 200);
    		}	
    	}

    	return $this->sendError('Wrong credentials', 400);
    }
}
