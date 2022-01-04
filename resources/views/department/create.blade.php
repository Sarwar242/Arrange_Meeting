@extends('Layout.AdminMaster')
@section('AddTeacherForm')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 offset-sm-5">
                        <h1>Create Department</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Fill The Form <small>Carefully</small></h3>
                            </div>
                            @if(Session::has('success'))

                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">
                                        x
                                    </button>
                                    <strong>
                                        {!! session('success') !!}
                                    </strong>
                                </div>
                            @endif
                            @if(Session::has('failed'))

                                <div class="alert alert-error alert-block">
                                    <button type="button" class="close" data-dismiss="alert">
                                        x
                                    </button>
                                    <strong>
                                        {!! session('failed') !!}
                                    </strong>
                                </div>

                            @endif
                            @foreach ($errors->all() as $message)
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">
                                      x
                                    </button>
                                    <strong>
                                        {!! $message !!}
                                    </strong>
                                  </div>
                            @endforeach
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{ route('admin.department.store') }}" method="post" >
                                @csrf
                                <div class="card-body">
                                    <p class="form-group text-center text-warning" id='warningday'></span>
                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>

                                    <div class="form-group col-sm-6 offset-sm-3">
                                        <label for="fac_name">Faculty Name</label>
                                        <select class="form-control selectpicker" name="faculty" id="fac_name" required>
                                            <option value="" disabled selected>Select One</option>
                                            @foreach (Helper::faculties() as $faculty)
                                                <option value="{{ $faculty }}">{{ $faculty }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer offset-sm-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
