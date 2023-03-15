<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function viewServices(){
        $services = Service::all();
        return view('services', compact('services'));
    }

    public function deleteService(Service $service){
        $service->delete();
        return redirect()->to('services.index')->with(["success" => "service is deleted successfuly"]);
    }
}
