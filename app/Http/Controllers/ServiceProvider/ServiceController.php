<?php

namespace App\Http\Controllers\ServiceProvider;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function createService(Request $request){

        $validateService = Validator::make($request->all(), 
            [
                'name' => 'required',
                'description' => 'nullable',
                'img' => 'nullable',
                'price' => 'required|numeric'
            ]);

            if($validateService->fails()){
                return redirect()->to(route('services.create'))->with(["errors" => $validateService->errors()]);
            }
        
        $service = Service::create([
            "name" => $request->name,
            "description" => $request->description,
            "img" => "dddddddddddd",
            "price" => $request->price
        ]);
        
        return redirect()->to(route('services.index'))->with(["success" => "Service Created Successfuly"]);
    }

    public function updateService(Request $request, Service $service){
        
        $validateService = Validator::make($request->all(), 
            [
                'name' => 'required',
                'description' => 'nullable',
                'img' => 'nullable',
                'price' => 'required|numeric'
            ]);

            if($validateService->fails()){
                return redirect()->to(route('services.update', $service->id))->with(["errors" => $validateService->errors()]);
            }
        
        $service->update([
            "name" => $request->name,
            "description" => $request->description,
            "img" => "dddddddddddd",
            "price" => $request->price
        ]);
        
        return redirect()->to(route('services.index'))->with(["success" => "Service Updated Successfuly"]);
    }

    public function updateForm(Service $service){
        return view('services.update', compact('service'));
    }

    public function viewServices(){
        $services = Service::all();
        return view('services.index', compact('services'));
    }
}

