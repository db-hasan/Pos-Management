@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>User List</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end pt-2">
                <a href="{{ route('user.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                    Add User</a>
            </div>
        </div>
        <hr>
        <div class="custom-scrollbar-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $user->name}}</td>
                            <td>
                                @if(!empty($user->getRoleNames()))
                                  @foreach($user->getRoleNames() as $name)
                                     <label class="badge rounded-pill text-bg-primary">{{ $name }}</label>
                                  @endforeach
                                @endif
                              </td>
                            <td>{{ $user->email}}</td>
                            <td>
                                @if($user->status == 1)
                                    Active
                                @elseif($user->status == 2)
                                    Inactive
                                @endif
                            </td>
                            <td class="d-flex justify-content-end">
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary mx-1"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <script src="{{ asset('backend/js/jquery-3.7.1.min.js') }} "></script>
@endsection
