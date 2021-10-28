<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    //
        public function addService()
    {
        return view('service.add-service');
    }

    public function trashServices()
    {
        $trash_services = Service::onlyTrashed()->get();
        return view('service.trash-service',compact('trash_services'));
    }

    public function services()
    {
        $services = Service::all();
        return view('service.all-service',compact('services'));
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'service' => 'required',
            //'description' => 'required',
        ]);

        $service_name = $request->service;
        $description = $request->description;
        

        $service = new Service();
        $service->service = $service_name;
        $service->description = $description;
        $service->save();
        return back()->with('dental_service_added','Dental service record has been inserted');
    }

    public function editDentalService($id)
    {
      $service = Service::find($id);
      return view('service.edit-service',compact('service'));
    }

    public function updateDentalService(Request $request)
    {
       $request->validate([
            'service' => 'required',
            //'description' => 'required',
        ]);

        $service = Service::find($request->id);

        $service_name = $request->service;
        $description = $request->description;

        $service->service = $service_name;
        $service->description = $description;
        $service->save();
        return back()->with('dental_service_updated','Dental service information updated successfully!');
    }

    public function trashDentalService($id)
    {
        $service = Service::find($id);
        $service->delete();
        //return Redirect()->back()->with('dental_service_deleted','Dental service deleted successfully!');
        return response()->json(['status'=>'Dental service deleted successfully!']);
    }

    public function restoreService($id)
    {
        $restore = Service::withTrashed()->find($id);
        $restore->restore();
        //return back()->with('dental_service_restored','Dental service has been restored successfully!');
        return response()->json(['status'=>'Dental service restored successfully!']);
    }
}
