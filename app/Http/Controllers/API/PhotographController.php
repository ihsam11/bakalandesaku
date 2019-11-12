<?php

namespace App\Http\Controllers\API;

use App\Photograph;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class PhotographController extends BaseController
{

    public function index()
    {
        //
        $photographs = Photograph::all();

        return $this->sendResponse($photographs->toArray(), 'Photographs retrieved successfully');
    }

    public function show($id)
    {
        //
        $photograph = Photograph::find($id);
        if(is_null($photograph)) {
            return $this->sendError('Photograph not found');
        }

        return $this->sendResponse($photograph->toArray(), 'Photograph retrieved successfully');
        
    }

}
