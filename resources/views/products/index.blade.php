@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex flex-column p-3 " style="height:92vh">
    <div class="row flex-grow-1 justify-content-center">
        <div class="col-lg">
            <div class="card " style="height:100%">
                <div class="card-header "><h6>{{ __('Products') }}</h6></div>

                <div class="card-body d-flex flex-row gap-2" style="overflow-x:auto">
                    @foreach($products as $product)
                    <button style="background: none; border: none; padding: 0; margin-top:0px; height:93%;" data-bs-toggle="modal" data-bs-target="#productModal">
                    <div class="card border-success mb-3" style="min-width: 10rem;height:100%;">
                        <div class="card-body text-success">
                            <p class="card-text text-center d-flex justify-content-center ">{{ $product->notes }}</p>
                        </div>
                        <div class="card-footer text-bg-success  text-center">{{ $product->description }}</div>
                    </div>
                    </button>
                    @endforeach
                    <button style="background: none; border: none; padding: 0; margin-top:0px; height:93%;" data-bs-toggle="modal" data-bs-target="#productModal">
                        <div class="card border-success mb-3" style="min-width: 10rem; height:100%;">
                            <div class="card-body text-success d-flex justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </div>  
                        </div>
                    </button>
                </div> 
                <div class="card-footer">
                    <div class="col">
                        <form action="{{ url('products/search') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <label for="searchCategory">Search: </label> &nbsp

                        <input name="search" type="text" style="width:30%;margin-right:10px;">
                        <button type="submit" class="btn btn-primary">Search</button>

                        &nbsp

                        <a href="{{ url('products/') }}" class="btn btn-secondary">Reset</a>

                        &nbsp <span style="color:gray">Category</span> &nbsp

                        <select name="searchCategory" id="searchCategory">
                            <option value="none">Select a Category</option>
                            @foreach($categories AS $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        &nbsp <span style="color:gray">Manufactiurer</span> &nbsp

                        <select name="searchManufacturer" id="searchManufacturer">
                            <option value="none">Select a Manufacturer</option>
                            @foreach($manufacturers AS $manufacturer)
                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                            @endforeach
                        </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-2">
        <div class="row mb-2">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="row justify-content-center gap-2 p-3">
                            <button type="button" class="btn btn-success py-2" data-bs-toggle="modal" data-bs-target="#categoryModal">
                                New Category
                            </button>
                            <button type="button" class="btn btn-success py-2" data-bs-toggle="modal" data-bs-target="#manufacturerModal">
                                New Manufacturer
                            </button>
                            <button type="button" class="btn btn-success">
                                See Datatables
                            </button>
                        </div>
                        

                        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Category</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="newCategoryForm" enctype="multipart/form-data" action="{{ url('products/category/store') }}">
                                            @csrf
                                            <!-- Category Name Input -->
                                            <div class="mb-3">
                                                <label for="categoryName" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" required>
                                            </div>

                                            <!-- Optional Description Input -->
                                            <div class="mb-3">
                                                <label for="categoryDescription" class="form-label">Description (optional)</label>
                                                <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3" placeholder="Enter a brief description (optional)"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="manufacturerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Manufacturer</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ url('products/manufacturer/store') }}" id="newManufacturerForm" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Manufacturer Name Input -->
                                        <div class="mb-3">
                                            <label for="manufacturerName" class="form-label">Manufacturer Name</label>
                                            <input type="text" class="form-control" id="manufacturerName" name="manufacturerName" placeholder="Enter manufacturer name" required>
                                        </div>

                                        <!-- Contact Phone Input -->
                                        <div class="mb-3">
                                            <label for="contactPhone" class="form-label">Contact Phone</label>
                                            <input type="text" class="form-control" id="contactPhone" name="contactPhone" placeholder="Enter contact phone number" required>
                                        </div>

                                        <!-- Contact Email Input -->
                                        <div class="mb-3">
                                            <label for="contactEmail" class="form-label">Contact Email <span style="color:gray">(Optional)</span></label>
                                            <input type="text" class="form-control" id="contactEmail" name="contactEmail" placeholder="Enter contact email">
                                        </div>

                                        <!-- Address Input -->
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter manufacturer's address" required></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="row justify-content-center gap-2 p-3">
                            <button type="button" class="btn btn-success py-2" data-bs-toggle="modal" data-bs-target="#productModal">
                                New Product
                            </button>
                            <button type="button" class="btn btn-success py-2" data-bs-toggle="modal" data-bs-target="#manufacturerModal">
                                Restocking
                            </button>
                        </div>
                        

                        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">New Products</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="newCategoryForm" enctype="multipart/form-data" action="{{ url('products/store') }}">
                                            <!-- Category Name Input -->
                                            <div class="mb-3">
                                                <label for="productDesc" class="form-label">Product Description</label>
                                                <input type="text" class="form-control" id="productDesc" name="productDesc" placeholder="Enter Product Description" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="productCategory" class="form-label">Product Category</label>
                                                <select class="form-control" id="productCategory" name="productCategory" placeholder="Enter Product Category" required>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="productManu" class="form-label">Product Manufacturer</label>
                                                <select class="form-control" id="productManu" name="productManu" placeholder="Enter Manufacturer" required>
                                                    @foreach($manufacturers as $manufacturer)
                                                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="productPrice" class="form-label">Product Price</label>
                                                <input type="text" class="form-control" id="productPrice" name="productPrice" placeholder="0.00" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="productCost" class="form-label">Product Cost</label>
                                                <input type="text" class="form-control" id="productCost" name="productCost" placeholder="0.00" required>
                                            </div>

                                            <!-- Optional Description Input -->
                                            <div class="mb-3">
                                                <label for="categoryDescription" class="form-label">Notes (optional)</label>
                                                <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3" placeholder="Enter a brief description (optional)"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="manufacturerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Manufacturer</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form id="newManufacturerForm">
                                        <!-- Manufacturer Name Input -->
                                        <div class="mb-3">
                                            <label for="manufacturerName" class="form-label">Manufacturer Name</label>
                                            <input type="text" class="form-control" id="manufacturerName" name="manufacturerName" placeholder="Enter manufacturer name" required>
                                        </div>

                                        <!-- Contact Phone Input -->
                                        <div class="mb-3">
                                            <label for="contactPhone" class="form-label">Contact Phone</label>
                                            <input type="text" class="form-control" id="contactPhone" name="contactPhone" placeholder="Enter contact phone number" required>
                                        </div>

                                        <!-- Contact Email Input -->
                                        <div class="mb-3">
                                            <label for="contactEmail" class="form-label">Contact Email <span style="color:gray">(Optional)</span></label>
                                            <input type="email" class="form-control" id="contactEmail" name="contactEmail" placeholder="Enter contact email" required>
                                        </div>

                                        <!-- Address Input -->
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter manufacturer's address" required></textarea>
                                        </div>

                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row col-sm mt-2 flex-grow-1" style="min-height:310px;">
        <div class="col-lg d-flex">
                <div class="card flex-grow-1">
                    <div class="card-header"><h6>{{ __('Stock Info') }}</h6></div>

                    <div class="card-body">
                        ...
                </div>   
            </div>
        </div>
    </div>
</div>
@endsection
