@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>Update Product</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end pt-2">
                <a href="{{ route('costing.index') }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i>
                    View
                    Product</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data"
                class="row g-3 p-3">
                @csrf
                @method('PUT')
            
                <!-- Brand Field -->
                <div class="col-md-6 pb-3">
                    <label for="brand_id" class="form-label">Brand<span class="text-danger">*</span></label>
                    <select id="brand_id" name="brand_id" class="form-select" required>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <!-- Size Field -->
                <div class="col-md-6 pb-3">
                    <label for="size_id" class="form-label">Size<span class="text-danger">*</span></label>
                    <select id="size_id" name="size_id" class="form-select" required>
                        @foreach ($sizes as $size)
                            <option value="{{ $size->id }}" {{ $size->size_id == $size->id ? 'selected' : '' }}>
                                {{ $size->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('size_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <!-- Color Field -->
                <div class="col-md-6 pb-3">
                    <label for="color_id" class="form-label">Color<span class="text-danger">*</span></label>
                    <select id="color_id" name="color_id" class="form-select" required>
                        @foreach ($colors as $color)
                            <option value="{{ $color->id }}" {{ $color->color_id == $color->id ? 'selected' : '' }}>
                                {{ $color->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('color_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <!-- Certification Field -->
                <div class="col-md-6 pb-3">
                    <label for="certification_id" class="form-label">Certification<span class="text-danger">*</span></label>
                    <select id="certification_id" name="certification_id" class="form-select" required>
                        @foreach ($certifications as $certification)
                            <option value="{{ $certification->id }}" {{ $certification->certification_id == $certification->id ? 'selected' : '' }}>
                                {{ $certification->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('certification_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Product Name Field -->
                <div class="col-md-6 pb-3">
                    <label for="name" class="form-label">Product Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="col-md-3 pb-3">
                    <label for="purchase_price" class="form-label">Purchase Price<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="purchase_price" name="purchase_price" value="{{ $product->purchase_price }}" required>
                    @error('purchase_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="col-md-3 pb-3">
                    <label for="wholesale_price" class="form-label">Wholesale Price<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="wholesale_price" name="wholesale_price" value="{{ $product->wholesale_price }}" required>
                    @error('wholesale_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="col-md-3 pb-3">
                    <label for="retail_price" class="form-label">Retail Price<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="retail_price" name="retail_price" value="{{ $product->retail_price }}" required>
                    @error('retail_price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="col-md-3 pb-3">
                    <label for="stock_qty" class="form-label">Stock QTY<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="stock_qty" name="stock_qty" value="{{ $product->stock_qty }}" required>
                    @error('stock_qty')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="col-md-3 pb-3">
                    <label for="vat" class="form-label">Vat<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="vat" name="vat" value="{{ $product->vat }}" required>
                    @error('vat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="col-md-3 pb-3">
                    <label for="tax" class="form-label">Tax<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="tax" name="tax" value="{{ $product->tax }}" required>
                    @error('tax')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="col-md-12 pb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" name="desc" placeholder="Leave a comment here" id="desc" style="height: 100px">{{ $product->desc }}</textarea>
                    @error('desc')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <!-- Status Field -->
                <div class="col-md-12">
                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-select" name="status" id="status">
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <!-- Submit Button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            
            
        </div>

    </main>
@endsection
