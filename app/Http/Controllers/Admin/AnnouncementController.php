<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Announcement;
use App\AnnouncementCategory;

class AnnouncementController extends Controller
{
    public function index()
	{
        $announcements = Announcement::all();
        $announcementCategory = AnnouncementCategory::all();
		return view('backend.admin.pages.announcements.index', compact('announcements', 'announcementCategory'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'title' => 'required|string',
            'category' => 'required|integer|exists:announcement_categories,id',
            'content' => 'required|string'
		]);
		Announcement::create([
            "title" => $request->title,
            "slug" =>str_slug($request->title),
            "category_id" => $request->category,
            "content" => $request->content,
		]);
		flash('Announcement has been created.')->success();
		return back();
	}

	public function update(Request $request)
	{
        $this->validate($request, [
            'title' => 'required|string',
            'category' => 'required|integer|exists:announcement_categories,id',
            'content' => 'required|string'
        ]);
        
        $announcement = Announcement::findOrFail($request->id);

		if ($announcement != null) {

			$announcement->update([
                "title" => $request->title?:$announcement->title,
                "slug" =>str_slug($request->title?:$announcement->title),
                "category_id" => $request->category?:$announcement->category,
                "content" => $request->content?:$announcement->content,
            ]);
			flash('Announcement has been updated.')->success();
		}	
		return back();
	}

	public function destroy(Request $request)
	{
		$announcement = Announcement::findOrFail($request->id);
		if ($announcement != null) {
			$announcement->delete();
		}
		flash('Announcement has been deleted.')->success();
		return back();
	}
}
