<?php

namespace App\Http\Controllers;

use App\Models\Voyage\Voyage;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    function acheter(Request $request,Voyage $voyage){

        return view('ticket.acheter',[
            'voyage'=> $voyage,
            'user'=>$request->user(),
        ]);
    }
}
