<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Comment;
use App\Ticket;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
	public function postComment(Request $request, AppMailer $mailer)
	{
		$this->validate($request, [
			'comment'   => 'required'
		]);

		$ticket = Ticket::findOrFail($request->input('ticket_id'));

		if($ticket->status != "closed"){
			$comment = Comment::create([
				'ticket_id' => $request->input('ticket_id'),
				'user_id'    => Auth::user()->id,
				'comment'    => $request->input('comment'),
			]);
			$ticket->update(['status' => 'answered']);
			// send mail if the user commenting is not the ticket owner
			if ($comment->ticket->user->id !== Auth::user()->id) {
				$mailer->sendTicketComments($comment->ticket->user, Auth::user(), $comment->ticket, $comment);
			}
			activity("ticket")->log("Post Comment in ticket ID: #" . $request->input('ticket_id'));

			$status = "Your comment has be submitted";
		} else {
			$status = "Can't comment, your ticket is not open";
		}

		return redirect()->back()->with("status", $status);
	}
}
