@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Vehicle') }}

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Vehicle Information</h3>

                    <form class="form" action="@if($edit){{ route('vehicle.update',$vehicle->id) }}@else{{ route('vehicle.save') }}@endif" method="post">
                        @csrf
                        <div class="form-group row">
                            <label>Brand</label>
                            <input class="form-control col-lg-4" type="text" name="brand" placeholder="Enter Brand" value="@if($edit){{ $vehicle->brand }}@endif">
                        </div>
                        <div class="form-group row">
                            <label>Model</label>
                            <input class="form-control col-lg-4" type="text" name="model" placeholder="Enter Model" value="@if($edit){{ $vehicle->model }}@endif">
                        </div>
                        <div class="form-group row">
                            <label>Type</label>
                            <input class="form-control col-lg-4" type="text" name="type" placeholder="Enter Type" value="@if($edit){{ $vehicle->type }}@endif">
                        </div>
                        <div class="form-group row">
                            <label>Year</label>
                            <input class="form-control col-lg-4" type="number" name="year" placeholder="Enter Year" value="@if($edit){{ $vehicle->year }}@endif">
                        </div>
                        <button type="submit" class="btn btn-sm btn-success">@if($edit)Update @else Add @endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
