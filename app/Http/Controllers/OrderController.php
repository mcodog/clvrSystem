<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class OrderController extends Controller
{
    public function index() {
        return View::make('orders.index');
    }

    public function analytics() {
        return View::make('orders.analytics');
    }
}
