@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>Category List</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end pt-2">
                <a href="{{ route('category.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                    Add Category</a>
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
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorys as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{ $category->name}}</td>
                            <td>
                                @if ($category->category_arttributes->isNotEmpty()) 
                                <ul>
                                    @foreach ($category->category_arttributes as $attribute)
                                    <li>{{ $attribute->attributes->name ?? 'N/A' }} | 
                                        <span class="text-info">Priority:</span> 
                                        {{ $attribute->priority }} 
                                        <span class="text-info">Status:</span>  
                                        @if ($attribute->status == 1)
                                            Active
                                        @elseif ($attribute->status == 2)
                                            Inactive
                                        @endif 
                                    </li>
                                    @endforeach
                                </ul>
                                @else
                                    <p>No attributes available</p>
                                @endif
                            </td>
                            
                            <td>
                                @if($category->status == 1)
                                    Active
                                @elseif($category->status == 2)
                                    Inactive
                                @endif
                            </td>
                            <td class="d-flex justify-content-end">
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary mx-1"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
