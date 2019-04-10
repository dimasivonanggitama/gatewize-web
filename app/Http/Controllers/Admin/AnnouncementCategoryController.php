<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AnnouncementCategory;

class AnnouncementCategoryController extends Controller
{
    public function index()
	{
        $announcementCategory = AnnouncementCategory::all();
		return view('backend.admin.pages.announcements.categories', compact('announcementCategory'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
            'name' => 'required|string',
		]);
		AnnouncementCategory::create([
            "name" => $request->name,
            "slug" =>str_slug($request->name),
		]);
		flash('Announcement category has been created.')->success();
		return back();
	}

	public function update(Request $request)
	{
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        
        $announcementCategory = AnnouncementCategory::findOrFail($request->id);

		if ($announcementCategory != null) {

			$announcementCategory->update([
                "name" => $request->name?:$announcementCategory->name,
                "slug" =>str_slug($request->name?:$announcementCategory->name)
            ]);
			flash('Announcement category has been updated.')->success();
		}	
		return back();
	}

	public function destroy(Request $request)
	{
		$announcementCategory = AnnouncementCategory::findOrFail($request->id);
		if ($announcementCategory != null) {
			$announcementCategory->delete();
		}
		flash('Announcement category has been deleted.')->success();
		return back();
	}
}
