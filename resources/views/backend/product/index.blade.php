@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="card ">
            <div class="card-body mt-4">
                <div class="row reverse">
                    <div class="col-sm-8 pb-3">
                        <input type="text" class="form-control" id="search" placeholder="Search here">
                    </div>
                    <div class="col-sm-4 text-end pb-3">
                        <a href="{{ route('product.create')}}" class="btn btn-primary"><i class="fa-regular fa-eye"></i>
                            Add Product</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 pb-3">
                        <label for="category_id" class="form-label">Category<span class="text-danger">*</span></label>
                        <select id="category_id" name="category_id" class="form-select" required>
                            <option selected disabled>Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>                   
                        @error('brand_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 pb-3">
                        <label for="subcategory_id" class="form-label">SubCategory<span class="text-danger">*</span></label>
                        <select id="subcategory_id" name="subcategory_id" class="form-select" required>
                            <option selected disabled>SubCategory</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                            @endforeach
                        </select>                   
                        @error('subcategory_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 pb-3">
                        <label for="childcategory_id" class="form-label">ChildCategory<span class="text-danger">*</span></label>
                        <select id="childcategory_id" name="childcategory_id" class="form-select" required>
                            <option selected disabled>ChildCategory</option>
                            @foreach ($childcategories as $childcategory)
                                <option value="{{ $childcategory->id }}">{{ $childcategory->name }}</option>
                            @endforeach
                        </select>                   
                        @error('childcategory_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-3 pb-3">
                        <label for="innerchild_id" class="form-label">InnerChild<span class="text-danger">*</span></label>
                        <select id="innerchild_id" name="innerchild_id" class="form-select" required>
                            <option selected disabled>InnerChild</option>
                            @foreach ($innerchilds as $innerchild)
                                <option value="{{ $innerchild->id }}">{{ $innerchild->name }}</option>
                            @endforeach
                        </select>                   
                        @error('innerchild_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
    
                    <div class="col-md-3 pb-3">
                        <label for="brand_id" class="form-label">Brand<span class="text-danger">*</span></label>
                        <select id="brand_id" name="brand_id" class="form-select" required>
                            <option selected disabled>Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>                   
                        @error('brand_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="col-md-3 pb-3">
                        <label for="size_id" class="form-label">Size<span class="text-danger">*</span></label>
                        <select id="size_id" name="size_id" class="form-select" required>
                            <option selected disabled>Select One</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>                    
                        @error('size_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="col-md-3 pb-3">
                        <label for="color_id" class="form-label">Color<span class="text-danger">*</span></label>
                        <select id="color_id" name="color_id" class="form-select" required>
                            <option selected disabled>Select One</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>                    
                        @error('color_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <div class="col-md-3 pb-3">
                        <label for="certification_id" class="form-label">Certification<span class="text-danger">*</span></label>
                        <select id="certification_id" name="certification_id" class="form-select" required>
                            <option selected disabled>Select One</option>
                            @foreach ($certifications as $certification)
                                <option value="{{ $certification->id }}">{{ $certification->name }}</option>
                            @endforeach
                        </select>                    
                        @error('certification_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="custom-scrollbar-table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>ChildCategory</th>
                        <th>InnerChild</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Certification</th>
                        <th>Purchase</th>
                        <th>Wholesale</th>
                        <th>Retail</th>
                        <th>Stock</th>
                        <th>Vat</th>
                        <th>Tax</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{ $product->category->name}}</td>
                            <td>{{ $product->subcategory->name}}</td>
                            <td>{{ $product->childcategory->name}}</td>
                            <td>{{ $product->innerchild->name}}</td>
                            <td>{{ $product->size->name}}</td>
                            <td>{{ $product->color->name}}</td>
                            <td>{{ $product->certification->name}}</td>
                            <td>{{ $product->purchase_price}}</td>
                            <td>{{ $product->wholesale_price}}</td>
                            <td>{{ $product->retail_price}}</td>
                            <td>{{ $product->stock_qty}}</td>
                            <td>{{ $product->vat}}</td>
                            <td>{{ $product->tax}}</td>
                            <td>{{ $product->desc}}</td>
                            <td>
                                @if ($product->status == 1)
                                    Active
                                @elseif($product->status == 2)
                                    Inactive
                                @endif
                            </td>
                            <td class="d-flex justify-content-end">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary mx-1"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
