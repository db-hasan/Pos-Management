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
                            Add Stock</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-2 pb-3">
                        <select id="type_id" name="type_id" class="form-select" required>
                            <option selected disabled>Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-2 pb-3">
                        <select id="type_id" name="type_id" class="form-select" required>
                            <option selected disabled>Models</option>
                            @foreach ($modeles as $modele)
                                <option value="{{ $modele->id }}">{{ $modele->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-2 pb-3">
                        <select id="type_id" name="type_id" class="form-select" required>
                            <option selected disabled>Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-2 pb-3">
                        <select id="size_id" name="size_id" class="form-select" required>
                            <option selected disabled>Size</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-2 pb-3">
                        <select id="color_id" name="color_id" class="form-select" required>
                            <option selected disabled>Color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-2 pb-3">
                        <select id="certification_id" name="certification_id" class="form-select" required>
                            <option selected disabled>Certification</option>
                            @foreach ($certifications as $certification)
                                <option value="{{ $certification->id }}">{{ $certification->name }}</option>
                            @endforeach
                        </select>
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
                        <th>Brand</th>
                        <th>Models</th>
                        <th>Type</th>
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
                            <td>{{ $product->brand->name}}</td>
                            <td>{{ $product->modeles->name}}</td>
                            <td>{{ $product->type->name}}</td>
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
