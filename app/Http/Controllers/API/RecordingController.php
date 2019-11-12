<?php

namespace App\Http\Controllers\API;

use App\Recording;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class RecordingController extends BaseController
{

    public function index()
    {
        //
        $recordings = Recording::all();

        return $this->sendResponse($recordings->toArray(), 'Recordings retrieved successfully');
    }

    public function show($id)
    {
        //
        $recording = Recording::find($id);
        if(is_null($recording)) {
            return $this->sendError('Recording not found');
        }

        return $this->sendResponse($recording->toArray(), 'Recording retrieved successfully');
        
    }

}
