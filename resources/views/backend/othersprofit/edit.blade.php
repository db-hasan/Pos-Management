@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>Update Others Profit</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end pt-2">
                <a href="{{ route('othersprofit.index') }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i>
                    View
                    Others Profit</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <form method="post" action="{{ route('othersprofit.update', $othersprofit->id) }}" encothersprofit="multipart/form-data"
                class="row g-3 p-3">
                @csrf
                @method('PUT')
                <div class="col-md-12 pb-3">
                    <label for="name" class="form-label">Others Profit Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $othersprofit->name }}"
                        required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 pb-3">
                    <label for="amount" class="form-label">Amount<span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="amount" name="amount" value="{{ $othersprofit->amount }}"
                        required>
                    @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 pb-3">
                    <label for="note" class="form-label">Note</label>
                    <input type="text" class="form-control" id="note" name="note" value="{{ $othersprofit->note }}"
                        >
                    @error('note')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                        <option value="1" {{ $othersprofit->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $othersprofit->status == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="col-12">
                    <button othersprofit="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </main>
@endsection
