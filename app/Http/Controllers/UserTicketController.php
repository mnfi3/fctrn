<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Media;
use App\Models\Notification;
use App\Models\Role;
use App\Models\Ticket;
use App\Models\TicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class UserTicketController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('access');
    }

    public function TicketsOngoingIndex(){

        if(hasRole(Role::ADMIN)){
            $tickets = Ticket::where('status','!=','بسته شده')->paginate(10);
        }
        else{
            $tickets = Ticket::where('user_id', Auth::user()->id)->where('status','!=','بسته شده')->paginate(10);
        }

        return view('user.tickets.user_tickets_ongoing', compact('tickets'));
    }

    public function TickeClosedIndex(){
        if(hasRole(Role::ADMIN)) {
            $tickets = Ticket::where('status', 'بسته شده')->paginate(10);
        }
        else{
            $tickets = Ticket::where('user_id', Auth::user()->id)->where('status', 'بسته شده')->paginate(10);
        }
        return view('user.tickets.user_tickets_closed', compact('tickets'));
    }

    public function closeTicket($ticket_id){
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status = "بسته شده";
        $ticket->save();
        Session::flash('status','درخواست به حالت بسته شده تغییر وضعیت پیدا کرد.');
        return redirect()->back();
    }

    public function createTicket()
    {
        $categories = TicketCategory::all();
        return view('user.tickets.create', compact('categories'));
    }

    public function StoreTicket(Request $request)
    {
        $request->validate([
            'media_id' => 'max:5120|mimetypes:application/pdf,image/jpeg, image/png,image/jpeg',
        ]);
        $ticket_id = generateUserBarcode(Ticket::count() + 1);
        if ($file = $request->file('media_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images/tickets/'.Auth::user()->id, $name);
            $photo = Media::create(['url'=>$name]);
            $input['media_id'] = $photo->id;
        }
        $ticket = new Ticket([
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id,
//            'ticket_id' => strtoupper(getRandomString(11)),
            'ticket_id' => $ticket_id,
            'category_id' => $request->input('category'),
            'priority' => $request->input('priority'),
            'message' => $request->input('message'),
            'media_id' =>$request->input('media_id'),
            'status' => "در جریان"
        ]);

        $ticket->save();
        Notification::create(['registrar_id'=>Auth::user()->id, 'file_id'=>'0', 'body'=>' توسط '.Auth::user()->name.' به ثبت رسید '.$ticket->ticket_id.' تیکت به شناسه ']);
        $fullname = getFullName(Auth::user());
        sendGroupMessage(
            [
                "تیکت جدید از طرف $fullname.(فاکتورین)",
                "تیکت جدید از طرف $fullname.(فاکتورین)"
            ],
            [
                '09226889467',
                '09145821998'
            ]);
        return redirect()->route('UserTickets.TicketsOngoingIndex')->with("status", "  درخواست شما با شناسه‌ی #$ticket->ticket_id در سامانه ثبت شد.");
    }

    public function ShowOngoing($ticket_id)
    {
        if(hasRole(Role::ADMIN)) {
            $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        }
        else{
            $ticket = Ticket::where('ticket_id', $ticket_id)->where('user_id', Auth::user()->id)->firstOrFail();
        }
        return view('user.tickets.showOngoing', compact('ticket'));
    }

    public function ShowClosed($ticket_id)
    {
        if(hasRole(Role::ADMIN)) {
            $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        }
        else {
            $ticket = Ticket::where('ticket_id', $ticket_id)->where('user_id', Auth::user()->id)->firstOrFail();
        }
        return view('user.tickets.showClosed', compact('ticket'));
    }

    public function PostComment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);
        Comment::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id' => Auth::user()->id,
            'comment' => $request->input('comment')
        ]);
        $ticket = Ticket::where('id', $request->input('ticket_id'))->firstOrFail();
        if(hasRole(Role::ADMIN)) {
            $ticket->status = "پاسخ پشتیبان";
            $ticket->save();
            sendGroupMessage(
                [
                    "تیکت جدید از طرف پشتیبانی(فاکتورین)",
                ],
                [
                    $ticket->user->mobile
                ]);
        }
        else{
            $ticket->status = "پاسخ کاربر";
            $ticket->save();
            $fullname = getFullName($ticket->user);
            sendGroupMessage(
                [
                    "پاسخ تیکت جدید از طرف $fullname.(فاکتورین)",
                    "پاسخ تیکت جدید از طرف $fullname.(فاکتورین)"
                ],
                [
                    '09226889467',
                    '09145821998'
                ]);
        }
        $ticket = Ticket::where('id',$request->input('ticket_id'))->first();
        Notification::create(['registrar_id'=>Auth::user()->id, 'file_id'=>'0', 'body'=>' توسط '.Auth::user()->name.' ثبت شد '.$ticket->ticket_id.'# پیام جدید برای تیکت به شناسه ']);
        Session::flash('status','پیام شما با موفقیت ثبت شد.');
        return redirect()->back();
    }
}
