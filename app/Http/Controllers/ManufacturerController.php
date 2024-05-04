<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\Redirect;
use View;

class ManufacturerController extends Controller
{
    public function store(Request $request) {
        $manufacturer = new Manufacturer();

        $manufacturer->name = $request->manufacturerName;
        $manufacturer->contact = $request->contactPhone;
        $manufacturer->email = $request->contactEmail;
        $manufacturer->address = $request->address;

        $manufacturer->save();
        return Redirect::to('products');
    }
}
