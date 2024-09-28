@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>Add Sotck</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end pt-2">
                <a href="" class="btn btn-primary"><i class="fa-regular fa-eye"></i>
                    View
                    Stock</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <form method="post" action="" enctype="multipart/form-data" class="row g-3 p-3">
                @csrf

                <div class="col-md-12 pb-3">
                    <label for="warehouse_id" class="form-label">Warehouse<span class="text-danger">*</span></label>
                    <select id="warehouse_id" name="warehouse_id" class="form-select" required>
                        <option selected disabled>Select One</option>
                        @foreach ($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                        @endforeach
                    </select>                    
                    @error('warehouse_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 pb-3">
                    <label for="product_id" class="form-label">Product<span class="text-danger">*</span></label>
                    <select id="product_id" name="product_id" class="form-select" required>
                        <option selected disabled>Select One</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>                    
                    @error('product_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

        
                <div class="col-md-6 pb-3">
                    <label for="stock_qty" class="form-label">Stock QTY<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="stock_qty" name="stock_qty" value="{{ old('stock_qty') }}" required>
                    @error('stock_qty')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
        
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        
    </main>
@endsection
