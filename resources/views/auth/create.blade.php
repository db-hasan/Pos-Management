@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>Create User</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end pt-2">
                <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i>
                    View
                    User</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data" class="row g-3 p-3">
                @csrf

                <div class="col-md-12 pb-3">
                    <label for="name" class="form-label">User Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="roles" class="form-label">Role<span class="text-danger">*</span></label>
                    {{-- <select class="form-control multiple" multiple name="roles[]"> --}}
                    <select class="form-control" name="roles[]">
                        <option selected disabled>Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 pb-3">
                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 pb-3">
                    <label for="new_password" class="form-label">New Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="new_password" name="new_password" value="">
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 pb-3">
                    <label for="new_password_confirmation" class="form-label">Confirm Password<span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="new_password_confirmation"
                        name="new_password_confirmation" value="">
                    @error('new_password_confirmation')
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
