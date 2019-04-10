<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::all();
		return view('backend.admin.pages.ticket.categories', compact('categories'));
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|string'
		]);
		Category::create([
			'name' => $request->name
		]);
		flash('Category has been created.')->success();
		return back();
	}

	public function update(Request $request, $categoryId)
	{
		$category = Category::find($categoryId);
		if ($category != null) {
			$category->update([
				'name' => $request->name ?: $category->name
			]);
			flash('Category has been updated.')->success();
		}	
		return back();
	}

	public function destroy($categoryId)
	{
		$category = Category::find($categoryId);
		if ($category != null) {
			$category->delete();
		}
		flash('Category has been deleted.')->success();
		return back();
	}
}
