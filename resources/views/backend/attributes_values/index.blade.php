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
                <a href="{{ route('attributes_values.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                    Add Attributes Value</a>
            </div>
        </div>
        <hr>
        <div class="custom-scrollbar-table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Attributes</th>
                        <th>Attributes Value</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attributesvalues as $attributesvalue)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $attributesvalue->attributes->name}}</td>
                            <td>{{ $attributesvalue->name}}</td>
                            <td>
                                @if($attributesvalue->status == 1)
                                    Active
                                @elseif($attributesvalue->status == 2)
                                    Inactive
                                @endif
                            </td>
                            <td class="d-flex justify-content-end">
                                <a href="{{ route('attributes_values.edit', $attributesvalue->id) }}" class="btn btn-primary mx-1"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
