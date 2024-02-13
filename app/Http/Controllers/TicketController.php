<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Voyage\Voyage;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    function acheter(Request $request,Voyage $voyage){

        return view('ticket.acheter',[
            'voyage'=> $voyage,
            'user'=>$request->user(),
        ]);
    }

    function mesTickets(){

        $tk = Auth::user()->tickets;
        return view('ticket.mes-tickets',[
            'tickets' => $tk
        ]);
    }

    function show(Ticket $ticket){

        return view('ticket.show',[
            'ticket' => $ticket
        ]);
    }
}
