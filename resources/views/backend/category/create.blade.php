@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>New Category</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
            <form method="post" action="{{ route('category.store') }}" enccategory="multipart/form-data" class="row g-3 p-3">
                @csrf

                <div class="col-md-12 pb-3">
                    <label for="name" class="form-label">Category<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 pb-3" id="rowWrapper">
                    <label class="form-label">Attributes<span class="text-danger">*</span></label>
                    <div class="d-flex mb-3 rowItem">
                        <select name="attributes_id[]" class="form-select me-2" required>
                            <option selected disabled>Select One</option>
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                        @error('attributes_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <input type="number" class="form-control me-2" name="priority[]" placeholder="Priority" value="{{ old('priority') }}" required>
                        @error('priority')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <a href="javascript:void(0)" class="btn btn-primary mx-2" id="addRow"><i class="bi bi-plus-square"></i></a>
                    </div>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Add new row
                    $('#addRow').click(function(e) {
                        e.preventDefault();
                        // Clone the first rowItem div
                        let newRow = $('.rowItem').first().clone();
                        // Clear the input fields of the cloned row
                        newRow.find('input').val('');
                        // Remove the addRow button from the cloned row
                        newRow.find('#addRow').remove();
                        // Add a delete button to the cloned row
                        newRow.append('<a href="javascript:void(0)" class="btn btn-danger mx-2 deleteRow"><i class="bi bi-trash"></i></a>');
                        // Append the cloned row to the wrapper
                        $('#rowWrapper').append(newRow);
                    });
            
                    // Delete a row
                    $(document).on('click', '.deleteRow', function(e) {
                        e.preventDefault();
                        // Only remove the row if there is more than one
                        if ($('.rowItem').length > 1) {
                            $(this).closest('.rowItem').remove();
                        }
                    });
                });
            </script> 
@endsection
