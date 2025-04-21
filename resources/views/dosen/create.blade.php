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
                                <h4 class="card-title">Add Row</h4>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add Row
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('dosenStore') }}">
                                @csrf
                                <div class="form-group">
                                        <label>Nik</label>
                                        <input id="nik" type="text" name="nik" class="form-control"
                                        placeholder="e. g.2372049"  maxlength="7" class="form-control" required autofocus/>
                                </div>
                                <div class="form-group">
                                        <label>Name</label>
                                        <input id="name" type="text" name="name" class="form-control"
                                        placeholder="e. g. John Doe"  maxlength="100" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                        <label>Bith Date</label>
                                        <input id="birth_date" type="date" name="birth_date" class="form-control"
                                        class="form-control" required/>
                                </div>
                                <div class="form-group">
                                        <label>Email</label>
                                        <input id="email" type="email" name="email" class="form-control"
                                        placeholder="e. g. johndoe@gmail.com"  maxlength="45" class="form-control" required/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class=" btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </form>    
                              
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
@endsection
