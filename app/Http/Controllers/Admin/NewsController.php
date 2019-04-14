<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
    	$news = News::all();
    	return view('backend.admin.pages.news.index', compact('news'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);    	
        if ($request->hasFile('image')) {
            $path = $request->image->store('images/news', 'public');
        }
        News::create([
            'slug' => $this->createSlug($request->title),
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path
        ]);
        flash('News has been created.')->success();
        return redirect('/admin/news');
    }

    protected function createSlug($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        $string = strtolower($string); // Convert to lowercase

        return $string;
    }

    public function create()
    {
    	return view('backend.admin.pages.news.create');
    }

    public function update(Request $request, $newsId)
    {
        $news = News::find($newsId);
        if ($news != null) {
            $this->validate($request, [
                'title' => 'required',
                'content' => 'required',
            ]);     
            $path = '';
            if ($request->hasFile('image')) {
                $path = $request->image->store('images/news', 'public');
            }
            $news->update([
                'slug' => $this->createSlug($request->title),
                'title' => $request->title ?: $news->title,
                'content' => $request->content ?: $news->content,
                'image' => $path ?: $news->image
            ]);
            flash('News has been updated.')->success();
            return back();
        }
        flash('News not found.')->error();
        return back();
    }

    public function destroy($newsId)
    {
    	$news = News::find($newsId);
        if ($news != null) {
            $news->delete();
        }
        flash('News has been deleted.')->success();
        return back();
    }
}
