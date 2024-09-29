@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>Update Attributes</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end pt-2">
                <a href="{{ route('attributes.index') }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i>
                    View
                    Attributes</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <form method="post" action="{{ route('attributes_values.update', $attributesvalues->id) }}" enctype="multipart/form-data"
                class="row g-3 p-3">
                @csrf
                @method('PUT')
            
                <div class="col-md-12 pb-3">
                    <label for="attributes_id" class="form-label">Attributes<span class="text-danger">*</span></label>
                    <select id="attributes_id" name="attributes_id" class="form-select" required>
                        @foreach ($attributes as $attribute)
                            <option value="{{ $attribute->id }}" {{ $attributesvalues->attributes_id == $attribute->id ? 'selected' : '' }}>
                                {{ $attribute->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('attributes_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
            
                <div class="col-md-12 pb-3">
                    <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                    <input type="name" class="form-control" id="name" name="name" value="{{ $attribute->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="col-md-12">
                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-select" name="status" id="status">
                        <option value="1" {{ $attribute->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $attribute->status == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
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
