<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class CustomerController extends Controller
{
    public function index() {
        return View::make('customers.index');
    }
}
