@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>Update User</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end pt-2">
                <a href="{{ route('user.index') }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i>
                    View
                    user</a>
            </div>
        </div>
        <hr>
        <div class="card">
            <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data"
                class="row g-3 p-3">
                @csrf
                @method('PUT')
                <div class="col-md-6 pb-3">
                    <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                        required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 pb-3">
                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                        required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="roles" class="form-label">Role<span class="text-danger">*</span></label>
                    {{-- <select class="form-control multiple" multiple name="roles[]"> --}}
                    <select class="form-control"  name="roles[]">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}" {{ in_array($role, $userRole) ? 'selected':'' }}>{{ $role }}</option>
                        @endforeach
                    </select>
                    @error('roles')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                    <select class="form-select" aria-label="Default select example" name="status" id="status">
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="2" {{ $user->status == 2 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 pb-3">
                    <label for="new_password" class="form-label">New Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 pb-3">
                    <label for="new_password_confirmation" class="form-label">Confirm Password<span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="new_password_confirmation"
                        name="new_password_confirmation"  required>
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
