<?php
namespace App\Services;

use App\Models\Ticket;
use Illuminate\Http\Request;
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

        $ticket->save();

        return redirect()->route('tickets');
    }


    public static function list(Int $item_per_page){
        $data['tickets'] = Ticket::paginate($item_per_page);
        return view('tickets.list')->with($data);
    }
}

                  