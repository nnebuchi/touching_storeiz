<?php
namespace App\Services;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketService
{
    public static function new(){
        return view('tickets.new');
    }

    public static function submit(Request $request){ 
        $ticket = new Ticket;

        if($request->hasFile('attachment')){
            $uploaded_photo = FileService::upload($request, 'attachment', 'public', 'ticket_files');
            $ticket->attachment = $uploaded_photo;
        }

        $ticket->subject = sanitize_input($request->subject);
        $ticket->description = sanitize_input($request->description);
        $ticket->user_id = Auth::user()->id;

        $ticket->save();
        Session(['alert'=>'success', 'msg'=>'New ticket created']);
        return redirect()->route('tickets');
    }

    public static function update(Request $request){ 
        $ticket = Ticket::where(['id'=>$request->id, 'user_id'=>Auth::user()->id])->firstOrFail();

        if($request->hasFile('attachment')){
            $uploaded_photo = FileService::upload($request, 'attachment', 'public', 'ticket_files', $ticket->attachment);
            $ticket->attachment = $uploaded_photo;
        }

        $ticket->subject = sanitize_input($request->subject);
        $ticket->description = sanitize_input($request->description);

        $ticket->save();
        Session(['alert'=>'success', 'msg'=>'Ticket updated']);
        return redirect()->route('tickets');
    }


    public static function list(Int $item_per_page){
        // dd(Auth::user()->tickets);
        $data['tickets'] = Auth::user()->tickets()->paginate($item_per_page);
        // dd($data);
        $data['title'] = 'My Tickets';
        return view('tickets.list')->with($data);
    }

    public static function delete(Request $request){
        
        $ticket = Ticket::where(['id'=>$request->id, 'user_id'=>Auth::user()->id])->firstOrFail();
        $deletFile = FileService::delete($ticket->attachment, 'public');
        $ticket->delete();
        Session(['alert'=>'success', 'msg'=>'Ticket deleted']);
        // if($deletFile){
            
        // }else{
        //     Session(['alert'=>'danger', 'msg'=>'Something Went Wrong']);
        // }
        
        return redirect()->route('tickets');
    }
}

                  