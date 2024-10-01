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
            <form method="post" action="{{ route('attributes.update', $attributes->id) }}" enctype="multipart/form-data" class="row g-3 p-3">
                @csrf
                @method('PUT')
                
                <div class="col-md-6 pb-3">
                    <label for="name" class="form-label">Attributes<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $attributes->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-3 pb-3">
                    <label for="priority" class="form-label">Priority<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="priority" name="priority" value="{{ $attributes->priority }}" required>
                    @error('priority')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
        
                <div class="col-md-3">
                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-select" name="status" id="status" required>
                        <option value="1" {{ $attributes->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $attributes->status == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 pb-3" id="rowWrapper">
                    <div class="d-flex justify-content-between mb-3 mx-2">
                        <label for="varision" class="form-label">Varision<span class="text-danger">*</span></label>
                        <a href="javascript:void(0)" class="btn btn-primary" id="addRow"><i class="bi bi-plus-square px-2"></i>Add New</a>
                    </div>
                    @foreach($attributes->varisions as $varision)
                        <div class="d-flex mb-3 rowItem">
                            <input type="text" class="form-control me-2" name="varision[]" placeholder="Varision" value="{{ $varision->name }}" required>
                            <select class="form-select" name="status_variation[]" required>
                                <option value="1" {{ $varision->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $varision->status == 2 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    
                        @error('varision')
                                <span class="text-danger">{{ $message }}</span>
                        @enderror
                    @endforeach
                </div>
                
                
                <div class="col-12 mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('attributes.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            $('#addRow').click(function(e) {
                e.preventDefault();
                let newRow = `<div class="d-flex mb-3 rowItem">
                                <input type="text" class="form-control me-2" name="varision[]" required>
                                <select class="form-select" name="status_variation[]" required>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>`;
                $('#rowWrapper').append(newRow);
            });
        </script>
        
        </div>

    </main>
@endsection
