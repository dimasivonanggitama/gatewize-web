<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
    	$services = Service::all();
    	return view('backend.admin.pages.services.index', compact('services'));
    }

    public function create()
    {
    	return view('backend.admin.pages.services.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required',
            'settings' => 'required',
            'trx_type' => 'required'
        ]);

        Service::create([
            'name' => $request->name,
            'url' => $request->url,
            'settings' => $request->settings,
            'trx_type' => $request->trx_type,
        ]);

        flash('Service has been created.')->success();
        return redirect('/admin/services');
    }

    public function update(Request $request, $serviceId)
    {
        $service = Service::find($serviceId);
        if ($service != null) {
            $service->update([
                'name' => $request->name ?: $service->name,
                'url' => $request->url ?: $service->url,
                'settings' => $request->settings ?: $service->settings,
                'trx_type' => $request->trx_type ?: $service->trx_type
            ]);
        }	
        flash('Service has been updated.')->success();
        return back();
    }

    public function destroy($serviceId)
    {
    	$service = Service::find($serviceId);
        if ($service != null) {
            $service->delete();
        }
        flash('Service has been deleted.')->success();
        return back();
    }

    public function activation($serviceId)
    {
        $service = Service::find($serviceId);
        if ($service != null) {
            $service->update([
                'is_active' => !$service->is_active
            ]);
        }
        $status = $service->is_active ? 'enabled' : 'disabled';
        flash('Service has been '.$status)->success();
        return back();
    }
}
