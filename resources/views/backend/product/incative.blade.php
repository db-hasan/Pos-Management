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
                        <th>Brand</th>
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
