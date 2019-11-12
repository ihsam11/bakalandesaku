<?php

namespace App\Http\Controllers\API;

use App\Bulletin;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class BulletinController extends BaseController
{

    public function index()
    {
        //
        $bulletins = Bulletin::all();

        return $this->sendResponse($bulletins->toArray(), 'Bulletins retrieved successfully');
    }

    public function show($id)
    {
        //
        $bulletin = Bulletin::find($id);
        if(is_null($bulletin)) {
            return $this->sendError('Bulletin not found');
        }

        return $this->sendResponse($bulletin->toArray(), 'Bulletin retrieved successfully');
        
    }

}
