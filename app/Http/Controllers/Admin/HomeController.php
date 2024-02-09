<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function dashbord(){

        $tickets = Ticket::all();
        return view('admin.dashbord',[
            'tickets'=> $tickets,
        ]);
    }
}
