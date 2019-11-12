<?php

namespace App\Http\Controllers\API;

use App\Profile;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class ProfileController extends BaseController
{

    public function index()
    {
        //
        $profiles = Profile::all();

        return $this->sendResponse($profiles->toArray(), 'Profiles retrieved successfully');
    }

    public function show($id)
    {
        //
        $profile = Profile::find($id);
        if(is_null($profile)) {
            return $this->sendError('Profile not found');
        }

        return $this->sendResponse($profile->toArray(), 'Profile retrieved successfully');
        
    }

}
