@extends('layouts.master')

@section('content')
<main>
                    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                        <div class="container-xl px-4">
                            <div class="page-header-content">
                                <div class="row align-items-center justify-content-between pt-3">
                                    <div class="col-auto mb-3">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="file"></i></div>
                                            Vehicle
                                        </h1>
                                    </div>
                                    <div class="col-12 col-xl-auto mb-3">Vehicle Information Form</div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-4">


                    <div class="row">
                            <div class="col-xl-12">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">Account Details</div>
                                    <div class="card-body">
                                        <form class="form" action="@if($edit){{ route('vehicle.update',$vehicle->id) }}@else{{ route('vehicle.save') }}@endif" method="post">
                                            @csrf
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputBrand">Brand</label>
                                                    <input class="form-control" id="inputBrand" name="brand" type="text" placeholder="Enter vehicle brand" value="@if($edit){{ $vehicle->brand }}@endif" />
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputModel">Model</label>
                                                    <input class="form-control" id="inputModel" name="model" type="text" placeholder="Enter vehicle model" value="@if($edit){{ $vehicle->model }}@endif" />
                                                </div>
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <!-- Form Group (first name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputType">Type</label>
                                                    <input class="form-control" id="inputType" name="type" type="text" placeholder="Enter vehicle type" value="@if($edit){{ $vehicle->type }}@endif" />
                                                </div>
                                                <!-- Form Group (last name)-->
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputModel">Year</label>
                                                    <input class="form-control" id="inputModel" name="year" type="text" placeholder="Enter vehicle year" value="@if($edit){{ $vehicle->year }}@endif" />
                                                </div>
                                            </div>

                                            <!-- Submit button-->

                                            <button type="submit" class="btn btn-sm btn-success">@if($edit)Update @else Add @endif</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
@endsection
