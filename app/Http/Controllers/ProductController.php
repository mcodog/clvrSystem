<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Redirect;
use DB;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;

use App\DataTables\CategoryDataTable;
use App\DataTables\ManufacturerDataTable;

class ProductController extends Controller
{
    public function index() {
        $categories = Category::all();
        $manufacturers = Manufacturer::all();
        $products = Product::all();
        return View::make('products.index', compact('categories', 'manufacturers', 'products'));
    }

    public function store(Request $request) {
        $product = new Product();
        $product->description = $request->productDesc;
        $product->category_id = $request->productCategory;
        $product->manufacturer_id = $request->productManu;
        $product->price = $request->productPrice;
        $product->cost = $request->productCost;
        $product->save();
        return Redirect::to('products');
    }

    public function search(Request $request)
    {
        $productsQuery = DB::table('product')
        ->join('manufacturer', 'manufacturer.id', '=', 'product.manufacturer_id')
        ->join('category', 'category.id', '=', 'product.category_id')
        ->select('product.description AS description', 'product.notes AS notes')
        ->where('product.description', 'LIKE', '%' . $request->search . '%');

        if (!($request->searchCategory == 'none')) {
            $productsQuery->where('category.id', '=', $request->searchCategory);
            // dump($request->searchCategory);
        }

        if (!($request->searchManufacturer == 'none')) {
            $productsQuery->where('manufacturer.id', '=', $request->searchManufacturer);
            // dump($request->searchManufacturer);
        }

        $products = $productsQuery->get();
        $categories = Category::all();
        $manufacturers = Manufacturer::all();

        return View::make('products.index', compact('categories', 'manufacturers', 'products'));
    }

    public function datatables(ManufacturerDataTable $manuDT, CategoryDataTable $catDT) {
        return view('products.tables.index', [
            'manuDT' => $manuDT,
            'catDT' => $catDT,
        ]);
    }
}
