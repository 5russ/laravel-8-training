@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Vehicle') }}

                    <a class="btn btn-sm btn-info" href="">Add Vehicle</a>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Add New Vehicle</h3>

                    <form class="form" action="{{ route('vehicle.save') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label>Brand</label>
                            <input class="form-control col-lg-4" type="text" name="brand" placeholder="Enter Brand">
                        </div>
                        <div class="form-group row">
                            <label>Model</label>
                            <input class="form-control col-lg-4" type="text" name="model" placeholder="Enter Model">
                        </div>
                        <div class="form-group row">
                            <label>Type</label>
                            <input class="form-control col-lg-4" type="text" name="type" placeholder="Enter Type">
                        </div>
                        <div class="form-group row">
                            <label>Year</label>
                            <input class="form-control col-lg-4" type="text" name="year" placeholder="Enter Year">
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">Add Vehicle</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
