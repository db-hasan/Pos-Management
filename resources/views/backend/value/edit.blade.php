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
            <form method="post" action="{{ route('attributes.update', $attributes->id) }}" enctype="multipart/form-data"
                class="row g-3 p-3">
                @csrf
                @method('PUT')
            
                <div class="col-md-12 pb-3">
                    <label for="category_id" class="form-label">Category<span class="text-danger">*</span></label>
                    <select id="category_id" name="category_id" class="form-select" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 pb-3">
                    <label for="varision_id" class="form-label">Varisions<span class="text-danger">*</span></label>
                    <select id="varision_id" name="varision_id" class="form-select" required>
                        @foreach ($varisions as $varision)
                            <option value="{{ $varision->id }}" {{ $varision->category_id == $varision->id ? 'selected' : '' }}>
                                {{ $varision->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('varision_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="col-md-12 pb-3">
                    <label for="priority" class="form-label">Amount<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="priority" name="priority" value="{{ $attributes->amount }}" required>
                    @error('priority')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            
                <div class="col-md-12">
                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-select" name="status" id="status">
                        <option value="1" {{ $attributes->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $attributes->status == 2 ? 'selected' : '' }}>Inactive</option>
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
