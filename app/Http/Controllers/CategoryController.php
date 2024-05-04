<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function store(Request $request) {
        $category = new Category();
        $category->name = $request->categoryName;
        $category->description = $request->categoryDescription;
        $category->save();

        return Redirect::to('products');
    }
}