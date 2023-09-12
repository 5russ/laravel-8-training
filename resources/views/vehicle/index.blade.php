@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Vehicle') }}

                    <a class="btn btn-sm btn-info" href="{{ route('vehicle.create') }}">Add Vehicle</a>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Session::get('success',false))
                    <div class="alert alert-success alert-notification" role="alert">
                            <i class="fa fa-check"></i>
                            {{ Session::get('success') }}
                        </div>
                    @endif



                    <table border="1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Type</th>
                                <th>Year</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicles as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->brand }}</td>
                                    <td>{{ $item->model }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->year }}</td>
                                    <td>
                                        <a href="{{ route('vehicle.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
