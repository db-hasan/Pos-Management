@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>Attributes Value</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end pt-2">
                <a href="{{ route('value.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                    Add Attributes Value</a>
            </div>
        </div>
        <hr>
        <div class="custom-scrollbar-table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Attributes</th>
                        <th>Attributes Value</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($values as $value)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $value->category->name}}</td>
                            <td>{{ $value->varision->name}}</td>
                            <td>{{ $value->value->name}}</td>
                            <td>{{ $value->priority}}</td>
                            <td>
                                @if($value->status == 1)
                                    Active
                                @elseif($value->status == 2)
                                    Inactive
                                @endif
                            </td>
                            <td class="d-flex justify-content-end">
                                <a href="{{ route('value.edit', $value->id) }}" class="btn btn-primary mx-1"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
