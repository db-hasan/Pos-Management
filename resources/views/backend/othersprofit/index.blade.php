@extends('backend/layouts')
@section('content')
    <main id="main" class="main">
        <div class="d-flex justify-content-between">
            <div class="pagetitle">
                <h1>Others Profit List</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </nav>
            </div>
            <div class="text-end pt-2">
                <a href="{{ route('othersprofit.create')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>
                    Add Others Profit</a>
            </div>
        </div>
        <hr>
        <div class="custom-scrollbar-table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Others Profit Name</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($othersprofits as $othersprofit)
                        <tr>
                            <td>{{$othersprofit->id}}</td>
                            <td>{{ $othersprofit->name}}</td>
                            <td>{{ $othersprofit->amount}}</td>
                            <td>{{ $othersprofit->note}}</td>
                            <td>
                                @if($othersprofit->status == 1)
                                    Active
                                @elseif($othersprofit->status == 2)
                                    Inactive
                                @endif
                            </td>
                            <td class="d-flex justify-content-end">
                                <a href="{{ route('othersprofit.edit', $othersprofit->id) }}" class="btn btn-primary mx-1"><i class="bi bi-pencil-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
