<?php

namespace App\Http\Controllers\API;

use App\Agenda;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class AgendaController extends BaseController
{

    public function index()
    {
        //
        $agendas = Agenda::all();

        return $this->sendResponse($agendas->toArray(), 'Agendas retrieved successfully');
    }

    public function show($id)
    {
        //
        $agenda = Agenda::find($id);
        if(is_null($agenda)) {
            return $this->sendError('Agenda not found');
        }

        return $this->sendResponse($agenda->toArray(), 'Agenda retrieved successfully');
        
    }

}
