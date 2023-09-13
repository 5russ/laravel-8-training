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
                                    <div class="col-12 col-xl-auto mb-3">Vehicle List</div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4 mt-4">
                        <div class="card">
                            <div class="card-header">
                                List of Vehicles
                            </div>
                            <div class="card-body">
                            <a class="btn btn-sm btn-info mb-3" href="{{ route('vehicle.create') }}">Add Vehicle</a>

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


                            <table border="1" class="table table-bordered" id="datatablesSimple">
                                <thead>
                                    <tr>
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
                                            <td>{{ $item->brand }}</td>
                                            <td>{{ $item->model }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->year }}</td>
                                            <td>
                                                @if($item->status == 0)
                                                    <button class="btn btn-sm btn-primary" disabled><i class="fa-regular fa-pen-to-square" data-toggle="tooltip" data-original-title="Edit"></i></button>
                                                    <button class="btn btn-sm btn-danger" disabled><i class="fa-solid fa-trash"></i></button>
                                                @else
                                                    <a href="{{ route('vehicle.edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-primary"><i class="fa-regular fa-pen-to-square" data-toggle="tooltip" data-original-title="Edit"></i></a>
                                                    <a href="{{ route('vehicle.delete.soft', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                    <a class="btn btn-sm btn-warning" id="ajaxDelete" data-vehicle-id="{{ Crypt::encrypt($item->id) }}"><i class="fa-solid fa-folder-minus"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    @push('css')
                    <link href="{{ asset('js') }}/DataTables/datatables.css" rel="stylesheet" />
                    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
                    @endpush
                    @push('js')
                    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
                    <script src="{{ asset('js') }}/DataTables/datatables.js"></script>
                    <script>
                        $(document).ready(function(){

                            $('[data-toggle="tooltip"]').tooltip({
                                placement : 'top'
                            });

                            $('#datatablesSimple').DataTable({
                                "paging": true,
                                "lengthChange": true,
                                "searching": true,
                                "ordering": true,
                                "info": true,
                                "autoWidth": true,
                                "responsive": true,
                                dom: "Brftip",
                                        buttons: ["excel","pageLength"],
                                        lengthMenu: [[25,50,75,100,-1],["25 rows","50 rows","75 rows","100 rows","Show All"]]
                            });

                            $(document).on('click','a#ajaxDelete',function(){
                                var vehicleId = $(this).attr('data-vehicle-id');
                                //alert(vehicleId);

                                $.ajax({
                                    headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                                    type:'get',
                                    url:'/vehicle/delete/ajax/'+vehicleId,
                                    success:function(data) {
                                        alert('Dah Berjaya Delete');
                                        window.location.href = '/vehicle';
                                    },
                                    error:function() {

                                    }
                                });

                            });

                        });
                    </script>
                    @endpush
                </main>
@endsection
