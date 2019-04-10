<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
	public function index()
	{
<<<<<<< HEAD
        $tickets = Ticket::all();
        $users = User::all();
        $categories = Category::all();
=======
		$users = User::all();
		$tickets = Ticket::all();
		$categories = Category::all();
>>>>>>> 7935388d09095ab331be4a9807fca5c2b19cb6b0
		return view('backend.admin.pages.ticket.index', compact('tickets', 'users', 'categories'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'user_id' => 'required|exists:users,id',
			'category_id' => 'required|exists:categories,id',
			'title' => 'required',
			'priority' => 'required|in:low,medium,high',
			'message' => 'required',
		]);
		Ticket::create([
			'user_id' => $request->user_id,
			'category_id' => $request->category_id,
			'ticket_id' => strtoupper(str_random(10)),
			'title' => $request->title,
			'priority' => $request->priority,
			'message' => $request->message,
			'status' => 'open'
		]);
		flash('ticket has been created.')->success();
		return redirect('/admin/tickets');
	}

	public function create()
	{
		$categories = Category::all();
		$users = User::all();
		return view('backend.admin.pages.ticket.create', compact('categories', 'users'));
	}

	public function update(Request $request, $ticketId)
	{
		$ticket = Ticket::find($ticketId);
		if ($ticket != null) {
			$this->validate($request, [
				'status' => 'required'
			]);
			$ticket->update([
				'user_id' => $request->user_id,
				'category_id' => $request->category_id,
				'title' => $request->title ?: $ticket->title,
				'priority' => $request->priority ?: $ticket->priority,
				'message' => $request->message ?: $ticket->message,
				'status' => $request->status ?: $ticket->status
			]);
			flash('Ricket has been updated.')->success();
			return back();
		}
		flash('Ricket not found.')->error();
		return back();
	}

	public function destroy($ticketId)
	{
		$ticket = Ticket::find($ticketId);
		if ($ticket != null) {
			$ticket->delete();
		}
		flash('Ticket has been deleted.')->success();
		return back();
	}
}
