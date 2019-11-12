<?php

namespace App\Http\Controllers\API;

use App\Broadcast;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class BroadcastController extends BaseController
{

    public function index()
    {
        //
        $broadcasts = Broadcast::all();

        return $this->sendResponse($broadcasts->toArray(), 'Broadcasts retrieved successfully');
    }

    public function show($id)
    {
        //
        $broadcast = Broadcast::find($id);
        if(is_null($broadcast)) {
            return $this->sendError('Broadcast not found');
        }

        return $this->sendResponse($broadcast->toArray(), 'Broadcast retrieved successfully');
        
    }

}
