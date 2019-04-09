<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Category;
use App\Mailers\AppMailer;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function create()
	{
		$categories = Category::all();

		return view('backend.member.pages.ticket.create', compact('categories'));
	}

	public function index()
	{
		$tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
		$categories = Category::all();

		return view('backend.member.pages.ticket.index', compact('tickets', 'categories'));
	}

	public function store(Request $request, AppMailer $mailer)
	{
		$this->validate($request, [
			'title'     => 'required',
			'category'  => 'required',
			'priority'  => 'required',
			'message'   => 'required'
		]);

		$ticket = new Ticket([
			'title'     => $request->input('title'),
			'user_id'   => Auth::user()->id,
			'ticket_id' => strtoupper(str_random(10)),
			'category_id'  => $request->input('category'),
			'priority'  => $request->input('priority'),
			'message'   => $request->input('message'),
			'status'    => "open",
		]);

		$ticket->save();

		$mailer->sendTicketInformation(Auth::user(), $ticket);

		activity("ticket")->log("Create new ticket with ID: #$ticket->ticket_id");

		return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
	}

	public function show($ticketId)
	{
		$ticket = Ticket::where('ticket_id', $ticketId)->firstOrFail();

		$comments = $ticket->comments;

		$category = $ticket->category;

		return view('backend.member.pages.ticket.show', compact('ticket', 'category', 'comments'));
	}

	public function close(Request $request, $ticketId)
	{
		$ticket = Ticket::where('ticket_id', $ticketId)->firstOrFail();
		
		$ticket->status = "close";

		$ticket->save();

		flash("Success close ticket ID: #$ticketId")->success();

		return redirect()->route('ticket.index');
	}
}
