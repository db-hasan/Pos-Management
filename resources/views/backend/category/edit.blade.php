@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>Update Category</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end pt-2">
                <a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i>
                    View
                    Category</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data" class="row g-3 p-3">
                @csrf
                @method('PUT')
                
                <div class="col-md-6 pb-3">
                    <label for="name" class="form-label">Category<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="col-md-6">
                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-select" name="status" id="status" required>
                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $category->status == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="col-md-12 pb-3" id="rowWrapper">
                    <div class="d-flex justify-content-between mb-3 mx-2">
                        <label for="arttributes_id" class="form-label">Attributes<span class="text-danger">*</span></label>
                        <a href="javascript:void(0)" class="btn btn-primary" id="addRow"><i class="bi bi-plus-square px-2"></i>Add New</a>
                    </div>
        
                    @foreach($category->category_arttributes as $arttribute)
                    <div class="row rowItem mb-4">
                        <div class="col-md-4">
                            <select name="attributes_id[]" class="form-select" required>
                                @foreach ($attributes as $item)
                                    <option value="{{ $item->id }}" {{ $arttribute->attributes_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('attributes_id.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="priority[]" placeholder="Priority" value="{{ $arttribute->priority }}" required>
                            @error('priority.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-md-4">
                            <select class="form-select" name="status_arttribute[]" required>
                                <option value="1" {{ $arttribute->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $arttribute->status == 2 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status_arttribute.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            $('#addRow').click(function(e) {
                e.preventDefault();
                let newRow = `<div class="row rowItem mb-4">
                                <div class="col-md-4">
                                    <select name="attributes_id[]" class="form-select" required>
                                        <option value="" disabled selected>Select One</option> <!-- Default Option -->
                                        @foreach ($attributes as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" name="priority[]" placeholder="Priority" required>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-select" name="status_arttribute[]" required>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                </div>
                            </div>`;
                $('#rowWrapper').append(newRow);
            });
        </script>

        
        
        </div>

    </main>
@endsection
