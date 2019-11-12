<?php

namespace App\Http\Controllers\API;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class UserController extends BaseController
{

    public function index()
    {
        //
        $users = User::all();

        return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
    }

    public function show($id)
    {
        //
        $user = User::find($id);
        if(is_null($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
        
    }

}
