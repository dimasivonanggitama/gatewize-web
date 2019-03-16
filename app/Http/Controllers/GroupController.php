<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.pages.group.index');
    }

    public function show($id = 0)
    {
        
    }

    public function create()
    {
        return view('admin.pages.group.add');
    }

    public function store(Request $request)
    {
        
    }

    public function edit($id = 0)
    {
        return view('admin.pages.group.edit');
    }

    public function update(Request $request, $id = 0)
    {
        
    }

    public function destroy($id = 0)
    {
        
    }
}
