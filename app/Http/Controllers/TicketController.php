<?php

namespace App\Http\Controllers;

use App\Services\TicketService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function new(){
        return TicketService::new();
    }

    public function submit(Request $request){
        $request->validate([
            'subject'=>'required',
            'description'=>'required|min:10',
            'attachment'=>'mimes:jpeg,jpg,png,pdf,docx|max:1024'
        ]);
        return TicketService::submit($request);
    }

    public function update(Request $request){
        // dd($request);
        $request->validate([
            'subject'=>'required',
            'description'=>'required|min:10',
            'attachment'=>'mimes:jpeg,jpg,png,pdf,docx|max:1024'
        ]);
        return TicketService::update($request);
    }

    public function all(){
       return TicketService::list(20);
    }

    public function delete(Request $request){
        return TicketService::delete($request);
    }
}
