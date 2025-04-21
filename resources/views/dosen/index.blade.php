@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">DataTables.Net</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Datatables</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Data</h4>
                                <a href="{{ route('dosenCreate') }}" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Row

                                </a>


                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> New</span>
                                                <span class="fw-light"> Row </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">
                                                Create a new row using this form, make sure you
                                                fill them all
                                            </p>
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Name</label>
                                                            <input id="addName" type="text" class="form-control"
                                                                placeholder="fill name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pe-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Position</label>
                                                            <input id="addPosition" type="text" class="form-control"
                                                                placeholder="fill position" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Office</label>
                                                            <input id="addOffice" type="text" class="form-control"
                                                                placeholder="fill office" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" id="addRowButton" class="btn btn-primary">
                                                Add
                                            </button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>BirthDate</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Birth Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($lectures as $lecture)
                                            <tr>
                                                <td>{{ $lecture->nik }}</td>
                                                <td>{{ $lecture->name }}</td>
                                                <td>{{ $lecture->email }}</td>
                                                <td>{{ $lecture->birth_date }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button data-bs-toggle="tooltip" title="Edit Dosen"
                                                            class="btn btn-link btn-primary btn-lg edit-dosen"
                                                            data-original-title="Edit Dosen"
                                                            data-url="{{ route('dosenEdit', [$lecture->nik]) }}"
                                                            >
                                                            
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <form method="post" action="{{ route('dosenDelete', [$lecture->nik]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        <button type="submit" data-bs-toggle="tooltip" title="Remove Dosen"
                                                            class="btn btn-link btn-danger del-dosen" data-original-title="Remove Dosen">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        </form>
                                                    </div>
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
        </div>
    </div>
@endsection

@section('ExtraCSS')
@endsection

@section('ExtraJS')
    <script src="{{ asset('assets/js/plugin/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        $(".edit-dosen").click(function() {
            window.location.href = $(this).data('url');
        })

        $(".del-dosen").click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Ara you sure want to delete this data",
                showCancelButton: true,
                confirmButtonText: "Yes"

            }).then((result) => {
                if(result.isConfirmed) {
                    $(e.target).closest("form").submit()
                }
            })
        })

        @if (session('status'))
            
        $.notify({
            message: "{{ session('status') }}"
        }, {
            delay: 5000,
            type: "info",
        })
        @endif
    </script>
@endsection
