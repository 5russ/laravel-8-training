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
                                        @if($item->status == 0)
                                            <button class="btn btn-sm btn-primary" disabled>Edit</button>
                                            <button class="btn btn-sm btn-danger" disabled>Delete</button>
                                        @else
                                            <a href="{{ route('vehicle.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="{{ route('vehicle.delete.soft', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-danger">Delete</a>
                                            <a class="btn btn-sm btn-warning" id="ajaxDelete" data-vehicle-id="{{ Crypt::encrypt($item->id) }}">Ajax Delete</a>
                                        @endif
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
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function(){

        $(document).on('click','a#ajaxDelete',function(){
		    var vehicleId = $(this).attr('data-vehicle-id');
			alert(vehicleId);
		});

    });
</script>
@endsection
