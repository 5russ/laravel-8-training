<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(){

        $vehicles = Vehicle::get();
        //dd($vehicles);

        return view('vehicle.index', compact('vehicles'));
    }

    public function create(){
        $edit = false;
        return view('vehicle.addVehicle',compact('edit'));
    }

    public function save(Request $request){
        //dd($request);
        $input = [];
        $input['brand'] = $request->brand;
        $input['model'] = $request->model;
        $input['type'] = $request->type;
        $input['year'] = $request->year;
        $input['status'] = 1;
        $input['created_at'] = now();
        //dd($input);

        Vehicle::insert($input);
        //Get ID from the new inserted
        //$vehicleId = Vehicle::insertGetId($input);
        /*
        Vehicle::insert([
            'brand' => $request->brand,
            'model' => $request->model,
            'type' => $request->type,
            'year' => $request->year,
            'status' => 1
        ]);
        */

        return redirect(route('vehicle.index'))->withSuccess('Vehicle data added successfully');
    }

    public function edit($id){
        $edit = true;
        $vehicle = Vehicle::where('id',$id)->first();
        //dd($vehicle);
        return view('vehicle.addVehicle',compact('vehicle','edit'));
    }

    public function update(Request $request, $id){
        //dd($request,'Vehicle ID :'.$id);
        $input = [];
        $input['brand'] = $request->brand;
        $input['model'] = $request->model;
        $input['type'] = $request->type;
        $input['year'] = $request->year;
        $input['status'] = 1;
        $input['updated_at'] = now();
        //dd($input);

        Vehicle::where('id',$id)->update($input);

        return redirect(route('vehicle.index'))->withSuccess('Vehicle updated added successfully');
    }
}
